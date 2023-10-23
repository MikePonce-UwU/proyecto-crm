<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Str;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Imports\CustomerImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:Admin|Team Supervisor|Team Collaborator|Main Salesman|Salesmen|Independiente'], ['only' => ['index']]);
        $this->middleware(['role:Admin|Team Supervisor|Team Collaborator|Independiente'], ['only' => ['store', 'create', 'update', 'edit']]);
        $this->middleware(['role:Admin'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('pages.customers.index', [
            'customers' => Customer::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = auth()->user()->is_admin ?
            \App\Models\User::all()->pluck('name', 'id') :
            \App\Models\User::where('current_team_id', auth()->user()->current_team_id)->get()->pluck('name', 'id');
        return view('pages.customers.create', [
            'users' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        //
        $validatedData = $request->validated();
        // dd($validatedData['foto']);
        $userData = User::find($validatedData['user_id']);
        // dd($userData);
        $customer = Customer::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'main_address' => $validatedData['main_address'],
            'secondary_address' => $validatedData['secondary_address'],
            'city' => $validatedData['city'],
            'state' => $validatedData['state'],
            'zip_code' => $validatedData['zip_code'],
            'county' => $validatedData['county'],
            'phone_number' => $validatedData['phone_number'],
            'owner_renter' => $validatedData['owner_renter'],
            'credit_rating' => $validatedData['credit_rating'],
            'home_value' => $validatedData['home_value'],
            'income' => $validatedData['income'],
            'age' => $validatedData['age'],
            'birth_month' => $validatedData['birth_month'],
            'status' => $validatedData['status'],
            // 'foto' => $validatedData['foto'],
            'user_id' => $userData->id,
            'team_id' => $userData->current_team_id,
        ]);
        if ($request->hasFile('foto')) {
            $imagen = $request->file('foto')->store('img/customers');
            // $nombre_imagen = Str::slug($request->first_name). '.' . $imagen->guessExtension();

            // $ruta = public_path('img/customers/');
            // copy($imagen->getRealPath(), $ruta.$nombre_imagen);
            // $imagen = Storage::disk('crm')->put('img/customers', $request->file('foto'));
            $imagen = Storage::put('public/img/customers/', $request->file('foto'));

            $customer->foto = $imagen;
            $customer->save();
        }
        return redirect()->route('admin.customers.index')->with('customer-success', 'Customer successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
        return view('pages.customers.edit', [
            'customer' => $customer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
        $customer->update($request->validated());
        if ($_FILES["foto"]["tmp_name"] !== '') {

            list($ancho, $alto) = getimagesize($_FILES["foto"]["tmp_name"]);

            $nuevoAncho = 500;
            $nuevoAlto = 500;

            /*=============================================
                CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                =============================================*/

            $directorio = "public/img/customers/" . $_POST["first_name"];

            mkdir($directorio, 0777, true);

            /*=============================================
                DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                =============================================*/

            if ($_FILES["foto"]["type"] == "image/jpeg") {

                /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                $aleatorio = mt_rand(100, 999);

                $ruta = "public/img/customers/" . $_POST["first_name"] . "/" . $aleatorio . ".jpg";

                $origen = imagecreatefromjpeg($_FILES["foto"]["tmp_name"]);

                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagejpeg($destino, $ruta);
            }

            if ($_FILES["foto"]["type"] == "image/png") {

                /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                $aleatorio = mt_rand(100, 999);

                $ruta = "public/img/customers/" . $_POST["first_name"] . "/" . $aleatorio . ".png";

                $origen = imagecreatefrompng($_FILES["foto"]["tmp_name"]);

                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                imagepng($destino, $ruta);
            }
            $customer->foto = $ruta;
            $customer->save();
        }

        return redirect()->route('admin.customers.index')->with('customer-success', 'Customer successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
        $customer->delete();
        return back()->with('customer-success', 'Customer successfully deleted');
    }
    public function massCreate(Request $request)
    {
        // return dd($request->all());
        $customer_file = $request->file('customers')->store('public/customers');
        // dd($customer_file);
        Excel::import(new CustomerImport(), $customer_file);
        return redirect()->route('admin.customers.index')->with('customer-success', 'Terminado');
    }
}
