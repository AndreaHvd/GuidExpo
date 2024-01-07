<?php
function get_panneaux_by_id($id)
{
    $file_content = file_get_contents("js/panneaux.json");
    $json_data = json_decode($file_content, true);
    if (array_key_exists($id, $json_data)) {
        $panneaux = $json_data[$id];
    } else {
        $panneaux = array(
            "name" => "unknown_name",
            "panneau" => "",
            "audio" => "",
        );
    }
    return $panneaux;
}

function get_all_panneaux()
{
    $file_content = file_get_contents("js/panneaux.json");
    $json_data = json_decode($file_content, true);
    return $json_data;
}

function get_profiles()
{
    $file_content = file_get_contents("js/profile.json");
    $json_data = json_decode($file_content, true);

    return $json_data;
}

function add_profile($profile_id, $avatar_id, $score)
{
    $file_content = file_get_contents("js/profile.json");
    $json_data = json_decode($file_content, true);
    $new_association["pseudo"] = $profile_id;
    $new_association["avatar"] = $avatar_id;
    $new_association["points"] = "0";
    array_push($json_data, $new_association);
    $new_file_content = json_encode($json_data);
    file_put_contents("js/profile.json", $new_file_content);
}
function str_contain($haystack, $needle)
{
    return strpos($haystack, $needle) !== false;
}
