<?php

namespace ApiHistogramBundle\Exception;

/**
 * Class ExceptionParameters
 * @package ApiHistogramBundle\Exception
 */
class ExceptionParameters
{
    const LOADER_FAILED_CODE = 520;

    const LOADER_FAILED_MESSAGE = "Failed to load the given class or interface";

    /**
     * @param $namespace
     * @return string
     */
    static public function getLoaderFailedMessage($namespace)
    {
        return "Failed to load the given class, {$namespace}";
    }

    const VALIDATOR_FAILED_CODE = 530;

    const VALIDATOR_FAILED_MESSAGE = "Validation failed";

    /**
     * @param $message
     * @return string
     */
    static public function getValidationFailed($message)
    {
        return "The validation failed with message: {$message}";
    }

    const VALIDATOR_CONTEXT_FAILED_CODE = 531;

    const VALIDATOR_CONTEXT_FAILED_MESSAGE = "The given class does not implement the expected interface";

    /**
     * @param $className
     * @return string
     */
    static public function getContextFailed($className)
    {
        return "The given class does not implement the expected interface, {$className}";
    }

    const VALIDATOR_TARGET_FAILED_CODE = 532;

    const VALIDATOR_TARGET_FAILED_MESSAGE = "Failed to validate the target";

    /**
     * @param $description
     * @return string
     */
    static public function getTargetFailedMessage($description)
    {
        return "Failed to validate the target, {$description}";
    }

    const CLEANER_EXCEPTION_MESSAGE = "An unexpected error in the Cleaner happened";

    const CLEANER_EXCEPTION_CLEAN_CODE = 533;
    const CLEANER_EXCEPTION_STRUCTURE_CODE = 534;

    /**
     * @param $description
     * @return string
     */
    static public function getCleanerException($description)
    {
        $text = ExceptionParameters::CLEANER_EXCEPTION_MESSAGE;
        return "{$text}, {$description}";
    }



    const COMMAND_LOADING_SITES_MESSAGE = "An error popped while attempting to load the sites";

    const COMMAND_LOADING_SITES_CODE = 551;

    /**
     * @param $description
     * @return string
     */
    static public function getCommandLoadingSitesMessage($description)
    {
        $header = ExceptionParameters::COMMAND_LOADING_SITES_MESSAGE;
        return "{$header}, {$description}";
    }


    const DOCTRINE_ENTITY_MANAGER_INVALID_CODE = 561;

    const DOCTRINE_ENTITY_MANAGER_INVALID_MESSAGE = "Failed to load the Entity Manager from the given connection";

    /**
     * @param $description
     * @return string
     */
    static public function getDoctrineEntityManagerInvalidMessage($description)
    {
        $message = ExceptionParameters::DOCTRINE_ENTITY_MANAGER_INVALID_MESSAGE;

        return "{$message}, {$description}";
    }

    const ENTITY_MANAGER_NOT_SET_MESSAGE = "The Entity Manager was not set";

    const ENTITY_MANAGER_NOT_SET_CODE = 562;

    /**
     * @param $description
     * @return string
     */
    static public function getEntityManagerNotSetMessage($description)
    {
        $message = ExceptionParameters::ENTITY_MANAGER_NOT_SET_MESSAGE;
        return "{$message}, {$description}";
    }

    const EXECUTE_INSERT_ENTITY_MANAGER_NULL = "While attempting to call the insert statement, the Entity Manager was not set";
    const EXECUTE_INSERT_ENTITY_MANAGER_NULL_CODE = 562;

    const EXECUTE_INSERT_DBAL_EXCEPTION = "There was an exception found at the DBAL Driver";
    const EXECUTE_INSERT_DBAL_EXCEPTION_CODE = 563;

    /**
     * @param $extra
     * @return string
     */
    static public function getExecuteInsertDBALException($extra)
    {
        $message = ExceptionParameters::EXECUTE_INSERT_DBAL_EXCEPTION;
        return "{$message}, {$extra}";
    }


    const CONNECTION_ERROR_CODE = 564;
    const CONNECTION_ERROR_MESSAGE = "A problem encountered while attempting to establish connection to the server";

    /**
     * @param $extra
     * @return string
     */
    static public function getConnectionError($extra)
    {
        $message = ExceptionParameters::CONNECTION_ERROR_MESSAGE;
        return "{$message}, {$extra}";
    }

    // MISC:
    const INTERFACE_NOT_FOUND_MESSAGE = "The given interface was not found";

}