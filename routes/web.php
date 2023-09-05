<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CidadeController;

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


Route::resource('cidades', 'CidadeController');

Route::prefix('/aluno')->group(function () {
    //ATT 1
    Route::get('/', function () {

        $alunos = "<ul>
        <li>Carlos Eduardo</li>
        <li>Maria Cláudia</li>
        <li>João Pedro</li>
        </ul>";

        echo $alunos;
    })->name('aluno');

    //ATT 2
    Route::get('/limite/{total}', function ($total) {

        $dados = array(
            "Carlos Eduardo",
            "Maria Cláudia",
            "João Pedro"
        );

        $cont = 0;
        $alunos = "<ul>";
        foreach ($dados as $nome) {
            $alunos = $alunos . "<li>$nome</li>";
            $cont++;
            if ($cont == $total) {
                break;
            }
        }

        $alunos = $alunos . "</ul>";
        echo "<h1>$alunos</h1>";
    })->where('total', '[0-9]+')->name('aluno_listagem');

    //ATT 3
    Route::get('/matricula/{matricula}', function ($matricula) {

        $dados = array(
            1 => "Gil",
            2 => "Eduardo",
            3 => "JV",
            4 => "Luiz"
        );

        $cont = 0;
        $alunos = "<ul>";
        foreach ($dados as $nome) {
            $cont++;
            if ($dados[$matricula] == $dados[$cont]) {
                echo "<h1>$nome</h1>";
            }
        }

        $alunos = $alunos . "</ul>";
    })->name('aluno_matricula');

    //ATT 4
    Route::get('/nome/{nome}', function ($nome) {

        $dados = array(
            1 => "Gil",
            2 => "Eduardo",
            3 => "JV",
            4 => "Luiz"
        );

        $nome = strtolower($nome);

        foreach ($dados as $cod => $aluno) {
            if (strtolower($aluno) === $nome) {
                return "<h1>$cod - $aluno</h1>";
            }
        }

        return "ALUNO Ñ ENCONTRADO!!!";
    })->name('aluno_nome');


    //ATT 5
    Route::get('/nota', function () {

        $dados = array(

            1 => array("nome" => "JV", "nota" => 9),
            2 => array("nome" => "Luiz", "nota" => 8),
            3 => array("nome" => "Gil", "nota" => 10),
        );

        $lista = "<ul>";
        foreach ($dados as $id => $aluno) {
            $lista = $lista . "<li> $id {$aluno['nome']} {$aluno['nota']}</li>";
        }

        $lista = $lista . "</ul>";

        return "<H2>Matricula Nome Nota</H2> <H2>$lista</H2>";
    })->name('aluno_nota');


    //ATT 6
    Route::get('/nota/limite/{limite}', function ($limite) {

        $dados = array(

            1 => array("nome" => "JV", "nota" => 9),
            2 => array("nome" => "Luiz", "nota" => 8),
            3 => array("nome" => "Gil", "nota" => 10),
        );

        $cont = 0;
        $lista = "<ul>";
        foreach ($dados as $id => $aluno) {
            $lista = $lista . "<li> $id {$aluno['nome']} {$aluno['nota']}</li>";
            $cont++;
            if($cont == $limite){
                break;
            }

        }

        $lista = $lista . "</ul>";

        return "<H2>Matricula Nome Nota</H2> <H2>$lista</H2>";
    })->where('total', '[0-9]+')->name('aluno_nota_limite');

    //ATT 7
    Route::get('/nota/lancar/{nota}/{matricula}/{nome?}', function ($nota, $matricula, $nome=null) {

        $dados = array(

            1 => array("nome" => "JV", "nota" => 9),
            2 => array("nome" => "Luiz", "nota" => 8),
            3 => array("nome" => "Gil", "nota" => 10),
        );

        if($nome != null){
            foreach ($dados as $id => $arr) {

                if (strtolower($nome) === strtolower($arr['nome'])) {
                    $dados[$matricula]['nota'] = $nota;
                    break;
                }
            }
        }


        $lista = "<ul>";
        foreach($dados as $id => $arr){
            $lista = $lista . "<li> $id, Nome: {$arr['nome']}, Nota: {$arr['nota']}</li>";
        }
        $lista = $lista . "</ul>";

        return "<H2>Matricula Nome Nota</H2> <H2>$lista</H2>";
    })->name('aluno_nota_lancar');
});



/*Route::get('/racas/{total}/{raca?}/', function ($total, $raca = null) {
    $dados = array(

        "Bulldog Inglês",
        "Labrador",
        "Pastor Alemão",
        "Akita"
    );
    $pets = "<ul>";
    if ($raca == null) {
        if ($total <= count($dados)) {
            $cont = 0;
            foreach ($dados as $item) {
                $pets .= "<li>$item</li>";
                $cont++;
                if ($cont >= $total)
                    break;
            }
        } else {
            $pets .= "<li>Tamanho Máximo = " . count($dados) . "</li>";
        }
    } else {
        for ($cont = 0; $cont < $total; $cont++) {
            $pets .= "<li>$raca</li>";
        }
    }
    $pets .= "</ul>";
    return $pets;
});*/

Route::post("aluno/add", function (Request $request) {

    echo $request->turma;
});