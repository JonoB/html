<?php

/**
 * Shortcut helper method to HTML::entities()
 */
function e($value) {
    return app()->html->entities($value);
}
