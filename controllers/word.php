<?php

namespace Controllers\Word;

function triedLetter(\PDO $pdo)
{
    $view = 'start.php';
    $_SESSION['totalWords'] = all($pdo);
    $_SESSION['wordsCount'] = count($_SESSION['totalWords']);
    $_SESSION['wordIndex'] = rand(0, $_SESSION['wordsCount']);
    $_SESSION['word'] = strtolower($_SESSION['totalWords'][$_SESSION['wordIndex']]['word']);
    $_SESSION['nbLetters'] = strlen($_SESSION['word']);
    $_SESSION['replacementString'] = str_pad('', $_SESSION['nbLetters'], REPLACEMENT_CHAR);
    $_SESSION['letters'] = LETTERS;
    $_SESSION['tryedLetters'] = '';
    $_SESSION['tryels'] = 0;
    return compact('view');
}

function triedWord()
{
    $view = 'start.php';
    $found = false;
    if (isset($_POST['triedLetter'])) {
        $triedLetter = $_POST['triedLetter'];
        $_SESSION['tryedLetters'] .= $triedLetter;
        $_SESSION['letters'][$triedLetter] = false;

        for ($i = 0; $i < $_SESSION['nbLetters']; $i++) {
            $letter = substr($_SESSION['word'], $i, 1);
            if ($triedLetter === $letter) {
                $found = true;
                $_SESSION['replacementString'] = substr_replace($_SESSION['replacementString'],
                    $triedLetter, $i, 1);
            }
        }
        if ($found === false) {
            $_SESSION['tryels']++;
        }
    }
    return compact('view');
}