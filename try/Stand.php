<?php

require_once 'Stagehand/PHP/Parser/Dumb.php';

class Stagehand_PHP_Parser_Stand extends Stagehand_PHP_Parser_Dumb
{
    public function execute($name, $params)
    {
        if (method_exists($this, $name)) {
            return $this->$name($params);
        } else {
            return parent::execute($name, $params);
        }
    }

    private function start_1($params)
    {
        return $params;
    }

    private function top_statement_list_1($params)
    {
        $params[0]->addValue($params[1]);
        return $params[0];
    }

    private function inner_statement_list_1($params)
    {
        $params[0]->addValue($params[1]);
        return $params[0];
    }

    private function class_statement_list_1($params)
    {
        $params[0]->addValue($params[1]);
        return $params[0];
    }

    private function interface_list_2($params)
    {
        $params[0]->addValue($params[1]);
        $params[0]->addValue($params[2]);
        return $params[0];
    }




    private function unticked_class_declaration_statement_1($params)
    {
        var_dump($params[0]->getValues());
        var_dump($params[1]);
        return parent::execute(__FUNCTION__, $params);
    }

    private function unticked_class_declaration_statement_2($params)
    {
        var_dump($params[1]);
        return parent::execute(__FUNCTION__, $params);
    }

    private function method_body_2($params)
    {
        $lex = $this->getParser()->lex;
        $methodTokens = $lex->getTokens($params[0]->getPos() + 1, $params[2]->getPos() - 1);

        $code = null;
        foreach ($methodTokens as $token) {
            if (is_array($token)) {
                $code .= $token[1];
            } else {
                $code .= $token;
            }
        }
        var_dump($code);

        return parent::execute(__FUNCTION__, $params);
    }
}