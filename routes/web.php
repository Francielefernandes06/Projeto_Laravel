<?php



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Candidato;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/cadastrar-candidato', function (request $informacoes) {
    Candidato::create([
        'nome' => $informacoes->nome_candidato,
        'telefone' => $informacoes->telefone_candidato
    ]);
    echo "Candidato cadastrado com sucesso!";
    

});

// obs
// função dd significa debug die