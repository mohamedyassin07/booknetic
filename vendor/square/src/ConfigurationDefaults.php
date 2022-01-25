<?php



namespace Square;

/**
 * Default values for the configuration parameters of the client.
 */
class ConfigurationDefaults
{
    const TIMEOUT = 60;

    const SQUARE_VERSION = '2021-07-21';

    const ADDITIONAL_HEADERS = [];

    const ENVIRONMENT = Environment::PRODUCTION;

    const CUSTOM_URL = 'https://connect.squareup.com';

    const ACCESS_TOKEN = '';
}
