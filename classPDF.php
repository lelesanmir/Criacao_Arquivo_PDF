<?php

//Pegar informações do arquivo fpdf
require('../../fpdf/fpdf.php');

//Criação da classe PDF que ira auxiliar na criação da tabela
class PDF extends FPDF
{
    public function Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=false, $link=''){
        $txt = utf8_decode($txt);
        parent::Cell($w, $h, $txt, $border, $ln, $align, $fill, $link);
    }

    //Método de carregar os dados
    public function LoadData($arquivo)
    {
        //Ler as linhas de arquivo
        $linhas = file($arquivo);
        $dados = array();
        foreach ($linhas as $linha)
        {
            $dados[] = explode(';',trim($linha));
        }
        //-------------------
        //DELETAR A PRIMEIRA LINHA PARA ACRESCENTAR COMO CABEÇALHO
        unset($dados[0]);
        //-------------------
        return $dados;
    }


    //Metodo que estrutura uma taela mais elaborada e colorida
    public function FancyTable($cabecalho, $dados)
    {
        //Alterações de cor, comprimento das linhas e a grossura da fonte
        $this->SetFillColor(255,0,0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');

        //Alterações de CABEÇALHO
        $w = array(30,25,100,20);
        for($i=0; $i < count($cabecalho);$i++)
        {
            $this->Cell($w[$i], 7, $cabecalho[$i], 1, 0, 'C', true);
        }
        $this->Ln();

        //Restauração de cor e fonte
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');

        //Dados
        $fill = false;
        foreach($dados as $linha)
        {
            $this->Cell($w[0], 6, $linha[0], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $linha[1], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $linha[2], 'LR', 0, 'R', $fill);
            $this->Cell($w[3], 6, $linha[3], 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill = !$fill;
        }

        //Fechar a linha
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}


?>