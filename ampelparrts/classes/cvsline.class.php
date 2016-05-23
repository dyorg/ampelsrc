<?php
/**
 *  Gera uma linha de um documento com
 *  valores separados por vírgula
 *  Created on 2011-07-20
 *  PHP version 5.3.0 and later
 *  @author Carlos Coelho <coelhoduda@hotmail.com>
 *  @version 0.1
 */
class CSVLine
{
    /**
     *  @var array Armazena todos os valores da linha
     *  @access private
     */
    private $storage;
    /**
     *  @var integer Armazena o número de campos da linha
     *  @access private
     */
    private $fields = 0;
    /**
     *  O construtor da classe CSVLine
     *  Cria uma nova linha de valores separados por vírgula
     *  @param mixed $arg1 opcional Um valor que será armazenado na linha
     *  @param mixed ... opcional Um valor que será armazenado na linha
     *  @param mixed $argn opcional Um valor que será armazenado na linha
     *  @access public
     *  @return void
     */
    public function __construct( )
    {
        $args = func_get_args( );
        for( $i = 0; $i < count( $args ); $i++ )
        {
            self::addValue( $args[ $i ] );
        }
    }
    /**
     *  Adiciona um novo valor à linha
     *  @param mixed $value Um valor
     *  @access public
     *  @return CSVLine Referência ao próprio objeto
     */
    public function addValue( $value )
    {
        $this->storage[ ] = ( preg_match( '/(,|\r\n|\n|"|\')+/' , $value ) ) ? sprintf( '"%s"' , preg_replace( '/"+/' , '""' , $value ) ) : $value;
        $this->fields++;
        return $this;
    }    
    /**
     *  Conta o número de colunas que a linha possui
     *  @access public
     *  @return integer
     */
    public function count( )
    {
        return count( $this->storage );
    }    
    /**
     *  Converte o objeto para sua representação em string
     *  @access public
     *  @return string
     */
    public function __toString( )
    {
        return implode( ";" , $this->storage );
    }
}
?>