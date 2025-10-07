<?php
// Utility to demonstrate safe read of admin flag file (not used in CTF flow)
echo file_get_contents(__DIR__ . '/../admin/flag.txt');
