<?php

namespace sisVentas\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
protected $table='Categoria';
protected $primaryKey='IdCategoria';
public $timestamps= false;
protected $fillable=[
'Nombre',
'Descripcion',
'Condicion'];
    use HasFactory;
}
