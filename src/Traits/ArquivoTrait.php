<?php

namespace MOCSolutions\Core\Traits;

use App\Http\Controllers\Controller;
use MOCSolutions\Core\Models\Arquivo;
use MOCSolutions\Core\Models\Documento;
use MOCUtils\Helpers\HelperController;
use MOCUtils\Helpers\SlackException;

/**
 * Class ArquivoController
 * @package MOCSolutions\Core\Controllers
 */
trait ArquivoTrait
{
    public function uploadAsyncProc()
    {
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

    }

    public function deleteAsyncProc()
    {
        $arquivoId = request()->get('data');

        $arquivo = Arquivo::find($arquivoId);
        $arquivoReturn = clone $arquivo;
        $arquivo->delete();

        return $arquivoReturn;
    }

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
