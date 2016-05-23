<?php
/**
 *  inclui a Classe CSVLine
 */
include_once( "cvsline.class.php" );


/* Exemplo de uso 
$line = new CSVLine( 'carlos coelho', 'Masculino' ); // crio uma linha e adiciono alguns valores
$line->addValue( 'RS' )->addValue( 'Brasil' ); // adiciono mais valores a esta linha
$line2 = new CSVLine( 'Mei Ling', 'Feminino', 'SP', 'Brasil' ); // crio outra linha e adiciono outros valores
$csv = new CSV; // crio o objeto CSV
$csv->addLine( $line )->addLine( $line2 ); // adiciono as duas linhas que criei
$csv->save( 'test.csv' ); // salvo o arquivo
*/


/**
 *  Classe para criar arquivos .csv
 *  Created on 2011-07-20
 *  PHP version 5.3.0 and later
 *  @author Carlos Coelho <coelhoduda@hotmail.com>
 *  @version 0.3
 */
final class CSV
{
    /**
     *  @var array Armazena todas as linhas
     *  que serão inseridas no arquivo
     *  @access private
     */
    private $storage;    
    /**
     *  @var integer Armazena o número de colunas
     *  @access private
     */
    private $fields = 0;
    /**
     *  Salva o arquivo em disco
     *  @param string $file O nome do arquivo
     *  @access public
     *  @return true Em caso de sucesso
     */
    public function save( $file )
    {
        try
        {
            $dir = dirname( $file );
            if( ! empty( $dir ) and ! is_dir( $dir ) )
            {
                throw new Exception( 'O diretório não existe.' );
            }
            if( file_exists( $file ) and ! is_writable( $file ) )
            {
                throw new Exception( 'O arquivo de destino não é gravável.' );
            }    
            if( ( $fp = fopen( $file , 'w+' ) ) )
            {
                $csv = self::__toString( );
                fwrite( $fp , $csv , strlen( $csv ) );
                fclose( $fp );
                return true;
            }
            else
            {
                throw new Exception( 'Não foi possível abrir/criar o arquivo para gravação.' );
            }
        }
        catch( Exception $e )
        {
            printf( 'Erro: %s', $e->getMessage( ) );
            return false;
        }
    }
    /**
     *  Adiciona uma nova linha ao CSV
     *  @param CSVLine $line A linha que será adicionada
     *  @access public
     *  @return CSV Referência ao próprio objeto
     */
    public function addLine( CSVLine $line )
    {
        try
        {
            if( ! count( $this->storage ) )
            {
                $this->fields = $line->count( );
            }
            elseif( $this->fields != $line->count( ) )
            {
                throw new Exception( 'Todas as linhas devem ter o mesmo número de colunas' );
            }        
            $this->storage[ ] = $line;
            return $this;
        }
        catch( Exception $e )
        {
            printf( 'Erro: %s', $e->getMessage( ) );
            return false;
        }
    }
    /**
     *  Converte o objeto para sua representação em string
     *  @access public
     *  @return string
     */
    public function __toString( )
    {
        return implode( PHP_EOL , $this->storage );
    }
}
?>