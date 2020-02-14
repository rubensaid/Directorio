<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    //
    
    protected $fillable = [
      'idComercio',
      'nombre',
      'comentario'
    ];
    
    public static function ValidateAndCreate(array $comentario = array())
    {
      if (strlen($comentario['comentario']) > 300)
        return 'Comentario no publicado, excede los 300 caracteres.';
      
      if (strlen($comentario['comentario']) < 1)
        return '¡No ha escrito un comentario!';
      
      if (strlen($comentario['nombre']) < 3)
        return 'Comentario no publicado, nombre muy corto.';
            
      self::create($comentario);
      
      return 'Comentario publicado!';
    }
}
