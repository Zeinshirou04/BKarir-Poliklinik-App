<?php

namespace App;

enum UserRole: string
{
    case Dokter = 'dokter';
    case Pasien = 'patient';
}
