<?php

/*
Simple script to convert from Octal to character and character to Octal
Author: Oxycoder
Sample Octal: 127 150 141 164 040 160 150 171 163 151 143 151 163 164 040 162 145 155 141 162 153 145 144 072 040 042 107 157 144 040 151 163 040 163 165 142 164 154 145 054 040 142 165 164 040 150 145 040 151 163 040 156 157 164 040 155 141 154 151 143 151 157 165 163 042 077
Sample Char: W h a t p h y s i c i s t r e m a r k e d G o d i s s u b t l e b u t h e i s n o t m a l i c i o u s
*/

class Octal2Text 
{
	private $octals = array(
		000	=>	'nul',
		001	=>	'soh',
		002	=>	'stx',
		003	=>	'etx',
		004	=>	'eot',
		005	=>	'enq',
		006	=>	'ack',
		007	=>	'bel',
		010	=>	'bs',
		011	=>	'ht',
		012	=>	'nl',
		013	=>	'vt',
		014	=>	'np',
		015	=>	'cr',
		016	=>	'so',
		017	=>	'si',
		020	=>	'dle',
		021	=>	'dc1',
		022	=>	'dc2',
		023	=>	'dc3',
		024	=>	'dc4',
		025	=>	'nak',
		026	=>	'syn',
		027	=>	'etb',
		030	=>	'can',
		031	=>	'em',
		032	=>	'sub',
		033	=>	'esc',
		034	=>	'fs',
		035	=>	'gs',
		036	=>	'rs',
		037	=>	'us',
		040	=>	'sp',
		041	=>	'!',
		042	=>	'"',
		043	=>	'#',
		044	=>	'$',
		045	=>	'%',
		046	=>	'&',
		047	=>	'\'',
		050	=>	'(',
		051	=>	')',
		052	=>	'*',
		053	=>	'+',
		054	=>	',',
		055	=>	'-',
		056	=>	'.',
		057	=>	'/',
		060	=>	'0',
		061	=>	'1',
		062	=>	'2',
		063	=>	'3',
		064	=>	'4',
		065	=>	'5',
		066	=>	'6',
		067	=>	'7',
		070	=>	'8',
		071	=>	'9',
		072	=>	':',
		073	=>	';',
		074	=>	'<',
		075	=>	'=',
		076	=>	'>',
		077	=>	'?',
		100	=>	'@',
		101	=>	'A',
		102	=>	'B',
		103	=>	'C',
		104	=>	'D',
		105	=>	'E',
		106	=>	'F',
		107	=>	'G',
		110	=>	'H',
		111	=>	'I',
		112	=>	'J',
		113	=>	'K',
		114	=>	'L',
		115	=>	'M',
		116	=>	'N',
		117	=>	'O',
		120	=>	'P',
		121	=>	'Q',
		122	=>	'R',
		123	=>	'S',
		124	=>	'T',
		125	=>	'U',
		126	=>	'V',
		127	=>	'W',
		130	=>	'X',
		131	=>	'Y',
		132	=>	'Z',
		133	=>	'[',
		134	=>	'\\',
		135	=>	']',
		136	=>	'^',
		137	=>	'_',
		140	=>	'`',
		141	=>	'a',
		142	=>	'b',
		143	=>	'c',
		144	=>	'd',
		145	=>	'e',
		146	=>	'f',
		147	=>	'g',
		150	=>	'h',
		151	=>	'i',
		152	=>	'j',
		153	=>	'k',
		154	=>	'l',
		155	=>	'm',
		156	=>	'n',
		157	=>	'o',
		160	=>	'p',
		161	=>	'q',
		162	=>	'r',
		163	=>	's',
		164	=>	't',
		165	=>	'u',
		166	=>	'v',
		167	=>	'w',
		170	=>	'x',
		171	=>	'y',
		172	=>	'z',
		173	=>	'{',
		174	=>	'|',
		175	=>	'}',
		176	=>	'~',
		177	=>	'del'
	);
	
	function convert ($input, $O2T = false) 
	{
		if(!$O2T) {
			// Convert from Octal to Text
			if (array_key_exists($input, $this->octals)) {
				return $this->octals[$input];
			} else {
				return false;
			}
		} else {
			// Convert from Text to Octal
			return array_search($input, $this->octals);
		}
		
	}
}

$data = $_POST['data'];
$result = "";
if(isset($data)){
	$temp = explode(' ', $data);
	$text = new Octal2Text();
	if($_POST['type'] == 'O2T'){
		foreach( $temp as $octal ){
			$result .= " " . $text->convert($octal, false);
		}
	} else {
		foreach( $temp as $octal ){
			$result .= " " . $text->convert($octal, true);
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Decoding</title>
</head>

<body>
<p>Enter octal seperate by space</p>
<p>Example: 127 150 141 164 040 144 157 040 171 157 165 040 143 141 154 154 040</p>
<form method="post" action="decode.php">
	<label for="data">Text</label><br />
	<textarea name="data"></textarea> <br /><br /><br />
	Text to Octal <input type="radio" name="type" value="T2O" placeholder="T2O"> 
	Octal to Text <input type="radio" name="type" value="O2T" placeholder="O2T" checked="checked"> <br /><br />
	<input type="submit">
</form>
<p><?php echo $result ?></p>
</body>
</html>
