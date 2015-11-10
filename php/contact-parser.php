<?php

function format_phone_number($phone_number)
{
    $num_digits = strlen($phone_number);
    if($num_digits === 10){
        return substr($phone_number,0,3) . '-' . substr($phone_number,3,3) . '-' . substr($phone_number, 6);
    } elseif ($num_digits === 7) {
        return substr($phone_number,0,3) . '-' . substr($phone_number,3);
    } elseif ($num_digits === 11) {
        return '+' . substr($phone_number,0,1) . ' ' . substr($phone_number,1,3) . '-' . substr($phone_number,4,3) . '-' . substr($phone_number, 7);
    } else {
        return $phone_number;
    }
}


function parseContacts($filename)
{
    $handle = fopen($filename, 'r');
    $contents = trim(fread($handle, filesize($filename) ) );
    fclose($handle);

    $contact_list = explode("\n", $contents);

    foreach ($contact_list as &$contact) {
        $contact_info = explode('|', $contact);
        $contact = [];  
        $contact['name'] = $contact_info[0];
        $contact['number'] = format_phone_number($contact_info[1]);
    }

    return $contact_list;
}

var_dump(parseContacts('contacts.txt'));

