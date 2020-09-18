<?php

namespace MOCSolutions\Core\Controllers;

use App\Http\Controllers\Controller;
use MOCSolutions\Core\Models\Arquivo;
use MOCSolutions\Core\Models\Documento;
use MOCUtils\Helpers\HelperController;
use MOCUtils\Helpers\SlackException;

/**
 * Class ArquivoController
 * @package MOCSolutions\Core\Controllers
 */
class ArquivoController extends Controller
{
    /**
     * Permission[administrar.arquivos]
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadAsync()
    {
        $helperController = new HelperController(function () {
            $file = request()->anexo[0];

            $arquivo = new Arquivo();
            $arquivo->nome = $file->getClientOriginalName();
            $fileName = uniqid() . '-' . $file->getClientOriginalName();
            $arquivo->tipo = $file->getMimeType();
            $arquivo->tamanho = $file->getSize();
            $arquivo->extensao = $file->extension();
            $arquivo->url = $fileName;
            $file->move(storage_path() . DS . 'core' . DS . 'uploads', $fileName);
            $arquivo->save();

            return $arquivo;
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
     * @return bool
     */
    public function deleteAsync()
    {
        $helperController = new HelperController(function () {
            $arquivoId = request()->get('data');

            $arquivo = Arquivo::find($arquivoId);
            $arquivoReturn = clone $arquivo;
            $arquivo->delete();

            return $arquivoReturn;
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
     * @return false|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|string
     */
    public function selecionaArquivo($url)
    {
        return $this->selecionaPorExtensao($url);
    }

    /**
     * @param $url
     * @return false|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|string
     */
    public function selecionaArquivoExportacao($url)
    {
        return $this->selecionaPorExtensao($url, true);
    }

    /**
     * @param $url
     * @return false|string
     */
    public function retornaImagem($url, $externo = false)
    {
        $local = storage_path() . DS . 'core' . DS . 'uploads' . DS . $url;

        if (file_exists($local)) {
            $file = file_get_contents($local);
        } else {
            $file = file_get_contents(public_path("images") . '/imagem_nao_encontrada.jpg');
        }

        return $file;
    }

    /**
     * @param $url
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function retornaArquivo($url)
    {
        $local = storage_path() . DS . 'core' . DS . 'uploads' . DS . $url;

        if (file_exists($local)) {
            $file = file_get_contents($local);
        } else {
            return redirect()->route('error.404');
        }

        $documento = (new Arquivo())->getByUrl($url);

        $local = $documento->contentType == 'application/pdf' ? 'inline' : 'attachment';

        return response()->make($file, 200, [
//            'Content-Type' => $documento->contentType,
            'Content-Length' => strlen($file),
            'Content-Disposition' => $local . '; filename="' . $documento->nome . '"'
        ]);
    }

    /**
     * @param $url
     * @return false|string
     */
    public function thumbPorNome($url)
    {
        return $this->retornaImagem($url);
    }

    /**
     * @param $file
     * @return false|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|string
     */
    private function selecionaPorExtensao($file, $externo = false)
    {
        $ext = substr($file, -4);

        switch (strtolower($ext)) {
            case ".jpg":
            case "jpeg":
            case ".png":
            case ".gif":
            case ".bmp":
                $result = $this->retornaImagem($file, $externo);
                break;
            case ".doc":
            case "docx":
            case ".xls":
            case "xlsx":
            case "html":
            case ".rtf":
            case ".eps":
            case ".zip":
                $result = $this->retornaArquivo($file);
                break;
            default:
                $result = $this->retornaArquivo($file);
                break;
        }

        return $result;
    }
}
