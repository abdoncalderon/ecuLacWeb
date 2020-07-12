<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientoExistencia extends Model
{
    protected $table = 'movimientos_existencias';

    protected $fillable = ['fecha','usuario_id','producto_id','sucursal_id','tipoMovimiento','cantidad'];
}
