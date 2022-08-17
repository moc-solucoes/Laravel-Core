<?php

namespace MOCSolutions\Core\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use MOCSolutions\Core\Models\Arquivo;
use MOCSolutions\Core\Traits\ArquivoTrait;
use MOCUtils\Helpers\HelperController;

/**
 * Class ArquivoController
 * @package MOCSolutions\Core\Controllers
 */
class ArquivoController extends Controller
{
    use ArquivoTrait;

    /**
     * Permission[administrar.arquivos]
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadAsync()
    {
        $helperController = new HelperController(function () {
            return  $this->uploadAsyncProc();
        });

        $retorno = $helperController->getObject();

        if ($helperController->getErrors()->count()) {
            return response()->setStatusCode(500, $helperController->getErrors()->implode(' | '))->json(['error' => true, 'message' => $helperController->getErrors()->implode(' | ')]);
        } else {
            return response()->json($retorno->id);
        }
    }

    /**
     * Permission[administrar.arquivos]
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteAsync()
    {
        $helperController = new HelperController(function () {
            return $this->deleteAsyncProc();
        });

        $retorno = $helperController->getObject();

        if ($helperController->getErrors()->count()) {
            return response()->json(['error' => true, 'message' => $helperController->getErrors()->implode(' | ')]);
        } else {
            return response()->json(['error' => false, 'data' => $retorno->id, 'arquivo' => $retorno, 'message' => "Arquivo <code>" . @$retorno->nome . "</code> excluído com sucesso."]);
        }
    }


    /**
     * @param $url
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function retornaArquivo($url)
    {
        $local = 'core' . DS . 'uploads'. DS . $url ;

        if (Storage::exists($local)) {
            $file = Storage::get($local);
        } else {
            return redirect()->route('error.404');
        }

        $documento = (new Arquivo())->getByUrl($url);

        $local = $documento->contentType == 'application/pdf' ? 'inline' : 'attachment';

        return response()->make($file, 200, [
            'Content-Type' => $documento->contentType,
            'Content-Length' => strlen($file),
            'Content-Disposition' => $local . '; filename="' . $documento->nome . '"'
        ]);
    }
}
