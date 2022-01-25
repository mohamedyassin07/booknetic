<?php



namespace Square\Models;

/**
 * DeviceCode.Status enum.
 */
class DeviceCodeStatus
{
    /**
     * The status cannot be determined or does not exist.
     */
    const UNKNOWN = 'UNKNOWN';

    /**
     * The device code is just created and unpaired.
     */
    const UNPAIRED = 'UNPAIRED';

    /**
     * The device code has been signed in and paired to a device.
     */
    const PAIRED = 'PAIRED';

    /**
     * The device code was unpaired and expired before it was paired.
     */
    const EXPIRED = 'EXPIRED';
}
