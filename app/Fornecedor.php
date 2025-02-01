<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    use SoftDeletes;
    //fornecedors -> eloquent
    //fornecedor -> model
    //fornecedores -> table
    //retificação para eloquent
    protected $table = 'fornecedores';

    // autorizar que metodo ::create receba estes parametros
    // php artisan tinker
    // \App\Fornecedor::create(['nome' => 'abc', 'uf' => 'ce', 'email' => 'tst
    // ', 'site' => 'teste']);
    //para uso do eloquent
    protected $fillable = ['nome', 'site', 'uf', 'email'];
}
