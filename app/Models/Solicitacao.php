<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Solicitacao extends Model
{
    use HasFactory;

    protected $table = 'solicitacao';

    protected $fillable = ['solicitacao'];

    // função para converter a data do tipo americano para 
    // o modelo do tipo data Brasileiro
    public function getDataAttribute( $value ) {
        return Carbon::parse($value)->format('d/m/Y');
      }
    //função criada para vazer a relação de tabelas de Solicitação com a de tablea de forncedores
    // o ultimo parametro é o nome do campo que fazemos relação
    public function fornecedor() {
        return $this->belongsTo(Fornecedor::class, 'forn_id');
    }

    public function produtos(){
        return $this->BelongsToMany(Produto::class, 'solicitacoes_produtos', 'soli_id', 'prod_id');
    }

}
