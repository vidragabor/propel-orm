<?php

namespace source\util;

class Action
{
    const DELIMITER = "-";
    const LIST = "list";
    const CREATE = "create";
    const EDIT = "edit";
    const DELETE = "delete";
    const SEARCH = "search";

    private $operation;
    private $entityId;

    public function __construct(string $param)
    {
        if (empty($param)) {
            $this->operation = self::LIST;
        } else {
            if (strpos($param, self::DELIMITER) !== false) {
                $input = explode(self::DELIMITER, $param);
                $possibleId = end($input);
                if (is_numeric($possibleId)) {
                    $this->entityId = $possibleId;
                    $this->operation = substr($param, 0, -(strlen($param) + 1));
                } else {
                    $this->operation = $param;
                }
            } else {
                $this->operation = $param;
            }
        }
    }

    public final function getOperation(): string
    {
        return $this->operation;
    }

    public final function getEntityId(): int
    {
        return $this->entityId;
    }
}