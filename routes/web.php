
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
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

/* Creating a route that will be used to create a new candidate. */
Route::post('/cadastrar-candidato', function (request $informacoes) {
    Candidato::create([
        'nome' => $informacoes->nome_candidato,
        'telefone' => $informacoes->telefone_candidato
    ]);
    return redirect('/mostrar_candidato');
});

/* Creating a route that will be used to show all the candidates that are in the database. */
Route::get('/mostrar_candidato', function () {
    $candidatos = Candidato::all();
    while ($candidatos->count() > 0) {
        echo "ID: " . $candidatos[0]->id . "<br>";
        echo "<br>";
        echo "Nome: " . $candidatos[0]->nome;
        echo "<br>";
        echo "Telefone: " . $candidatos[0]->telefone;
        echo "<br>";
        echo "<a class='btn btn-success'>Editar</a>";
        echo "|";
        echo "<button class='btn btn-danger' >Excluir</button>";
        echo "<hr>";
        $candidatos->shift();
    } 
});

Route::get('/mostrar_candidato/{id}', function ($id) {
    $candidato= Candidato::findOrFail($id);
    echo $candidato->nome;
    echo "<br>";
    echo $candidato->telefone;
});


Route::get('/editar_candidato/{id}', function ($id) {
    $candidato= Candidato::findOrFail($id);
    return view('editar_candidato', ['candidato' => $candidato]);
    }
);

Route::put('/atualizar_candidato/{id}', function (Request $informacoes, $id) {

    $candidato= Candidato::findOrFail($id);
    $candidato->nome = $informacoes->nome_candidato;
    $candidato->telefone = $informacoes->telefone_candidato;
    $candidato->save();
    echo "Candidato atualizado com sucesso!";
}

);

Route::get('/deletar_candidato/{id}', function ($id) {
    $candidato= Candidato::findOrFail($id);
    $candidato->delete();
    echo "Candidato deletado com sucesso!";
}

);
    

// obs
// fun????o dd significa debug die