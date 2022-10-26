<?php

namespace SRC;

class Funcoes
{
    /*

    Desenvolva uma função que receba como parâmetro o ano e retorne o século ao qual este ano faz parte. O primeiro século começa no ano 1 e termina no ano 100, o segundo século começa no ano 101 e termina no 200.

	Exemplos para teste:

	Ano 1905 = século 20
	Ano 1700 = século 17

     * */
    public function SeculoAno(int $ano): int {
        $seculo = $ano/100;
        
        if ($ano % 100 == 0){
            return $seculo;
        }
        
        return $seculo + 1;
    }

    
	
	
	
	
	
	
	
	/*

    Desenvolva uma função que receba como parâmetro um número inteiro e retorne o numero primo imediatamente anterior ao número recebido

    Exemplo para teste:

    Numero = 10 resposta = 7
    Número = 29 resposta = 23

     * */
    public function PrimoAnterior(int $numero): int {
        for ($procuraPrimo = $numero-1; $procuraPrimo > 0; $procuraPrimo--){
            
            for($i = $procuraPrimo-1; $i > 1; $i--){
                if ($procuraPrimo % $i == 0){
                    break;
                }
            }
            
            if($i== 1){
                return $procuraPrimo;
            }
        }
        return 0; /* Sem numeros primos anteriores (entrada 2...)*/
    }










    /*

    Desenvolva uma função que receba como parâmetro um array multidimensional de números inteiros e retorne como resposta o segundo maior número.

    Exemplo para teste:

	Array multidimensional = array (
	array(25,22,18),
	array(10,15,13),
	array(24,5,2),
	array(80,17,15)
	);

	resposta = 25

     * */
    public function SegundoMaior(array $arr): int {
        $maior = 0;
        $segundMaior = 0;
        
        foreach($arr as $line){
            foreach($line as $number){
                if($number > $maior){
                    /*se o numero for maior que o $maior então 'apaga' o $segundoMaior e troca com o maior*/
                    $segundoMaior = $number;
                    
                    /*troma o maior pelo segundoMaior...*/
                    $maior = $segundoMaior + $maior;
                    $segundoMaior = $maior - $segundoMaior;
                    $maior = $maior - $segundoMaior;
                }else{
                   
                    if($number > $segundoMaior){ /*Caso o numero seja apenas maior que o segundo maior*/
                        $segundoMaior = $number;
                    }
                }
            }
        }
        return $segundoMaior;
    }
	
	
	
	
	
	
	

    /*
   Desenvolva uma função que receba como parâmetro um array de números inteiros e responda com TRUE or FALSE se é possível obter uma sequencia crescente removendo apenas um elemento do array.

	Exemplos para teste 

	Obs.:-  É Importante  realizar todos os testes abaixo para garantir o funcionamento correto.
         -  Sequencias com apenas um elemento são consideradas crescentes

    [1, 3, 2, 1]  false
    [1, 3, 2]  true
    [1, 2, 1, 2]  false
    [3, 6, 5, 8, 10, 20, 15] false
    [1, 1, 2, 3, 4, 4] false
    [1, 4, 10, 4, 2] false
    [10, 1, 2, 3, 4, 5] true
    [1, 1, 1, 2, 3] false
    [0, -2, 5, 6] true
    [1, 2, 3, 4, 5, 3, 5, 6] false
    [40, 50, 60, 10, 20, 30] false
    [1, 1] true
    [1, 2, 5, 3, 5] true
    [1, 2, 5, 5, 5] false
    [10, 1, 2, 3, 4, 5, 6, 1] false
    [1, 2, 3, 4, 3, 6] true
    [1, 2, 3, 4, 99, 5, 6] true
    [123, -17, -5, 1, 2, 3, 12, 43, 45] true
    [3, 5, 67, 98, 3] true

     * */
                                                    /*Não deveria ser bool? */
	public function SequenciaCrescente(array $arr): boolean {
        $arrLen = count($arr) - 1;
        $ver1 = 1;
        $ver2 = 1;
        for ($i = 0, $j = 1; $i < $arrLen; $i++, $j++){
            /*Encontra o primeiro "erro"*/
            if($arr[$i] >= $arr[$j]){
                $iRemoved = $arr;
                $jRemoved = $arr;
                
                
                /*remove os possiveis elementos que quebram a sequencia*/
                unset($iRemoved[$i]);
                $iRemoved = array_values($iRemoved);
                
                unset($jRemoved[$j]);
                $jRemoved = array_values($jRemoved);
                
                /*Verifica se a sequencia fica valida com uam das remoções*/
                for($k= 0; $k < count($iRemoved) - 1; $k++){
                    if($iRemoved[$k] >= $iRemoved[$k+1]){
                        $ver1 = 0;
                        break;
                    }
                }
                
                for($k= 0; $k < count($jRemoved) - 1; $k++){
                    if($jRemoved[$k] >= $jRemoved[$k+1]){
                        $ver2 = 0; 
                        break;
                    }
                }
                
                break;
            }
        }
        
    if($ver1 == 1 || $ver2 == 1){
        return true;
    }else{
        return false;
    }
        
}
}
