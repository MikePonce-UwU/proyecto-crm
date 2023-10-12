<?php 
namespace App\Enums;

enum TeamRole: string {
    case Supervisor = 'supervisor';
    case Collaborator = 'collaborator';
}