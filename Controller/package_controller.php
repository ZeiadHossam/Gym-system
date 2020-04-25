<?php
if (isset($_GET['packageEditId']) && isset($_GET['addPackage'])) {



} elseif (isset($_GET['packageDeleteId'])) {



} elseif (isset($_GET['addPackage']) && !isset($_GET['packageEditId'])) {
    foreach($_GET['contractTypes'] as $type)
    {
        
    }
}