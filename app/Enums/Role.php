<?php

namespace App\Enums;

enum Role: string
{
    case Admin = 'Admin';
    case Editor = 'Editor';
    case Author = 'Author';
}