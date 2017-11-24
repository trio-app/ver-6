<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('app_ver'))
{
    function app_ver()
    {
        // version format : 
        // major.minor[.build[.revision]]
        // or
        // major.minor[.maintenance[.build]]
        return "BETA Version <b>0.9.0.1</b>";
    }   
}

if ( ! function_exists('app_id'))
{
    function app_id()
    {
        // version format : 
        // major.minor[.build[.revision]]
        // or
        // major.minor[.maintenance[.build]]
        return "PEMI_001";
    }   
}

if ( ! function_exists('app_title'))
{
    function app_title()
    {
        // Application Name / Title
        // Insert Below
        return "[ <b>PEMI</b> ] Asset Management";
    }   
}

if ( ! function_exists('app_upgrade'))
{
    function app_upgrade()
    {
        // Application Upgrade Detail
        // Insert Below
        $detail = "Updated Modules :"
                . "<ul>"
                . "<li></li>"
                . "<li></li>"
                . "<li></li>"
                . "<li></li>"
                . "</ul>";
        
        
        return $detail;
    }   
}
