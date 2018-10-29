<?php 
App::uses('Component', 'Controller');

class VisualCaptchaComponent extends Component {
	
	public function showCaptcha(){
		$answer = $this->getAnswer();
		$pool = $this->getPool($answer);
		
		return $this->generateHtml($answer,$pool);
	}
	
	public function validateCaptcha($response, $request){		
		$hash_request = md5($request).'c';
		
		if($hash_request == $response){
			return true;
		}
		
		return showCaptcha();
	}
	
	private function generateHtml($answer, $pool){
		$html='
		<label>Verify you are a person by clicking the <strong>'.strtoupper($answer).'</strong></label>
		<ul class="captcha">
		<li class="captcha-icon"><span class="glyphicon icon-'.$pool[0].'" id="'.$pool[0].'"></span></li>
		<li class="captcha-icon"><span class="glyphicon icon-'.$pool[1].'" id="'.$pool[1].'"></span></li>
		<li class="captcha-icon"><span class="glyphicon icon-'.$pool[2].'" id="'.$pool[2].'"></span></li>
		<li class="captcha-icon"><span class="glyphicon icon-'.$pool[3].'" id="'.$pool[3].'"></span></li>
		<li class="captcha-icon"><span class="glyphicon icon-'.$pool[4].'" id="'.$pool[4].'"></span></li>
		</ul>
		<input type="hidden" name="captcha-response" id="visual-captchares" value="">
		<input type="hidden" name="captcha-request" id="visual-captchareq" value="'.$answer.'">';
		return $html;
	}
	
	private function getAnswer(){
		$answers = array('heart','star','flag','leaf','bell');
		shuffle($answers);
		return $answers[array_rand($answers)];
	}
	
	private function getPool($answer){
		$items = array('heart','star','flag','leaf','bell','camera','cloud','fire','paperclip','music');
		if(($key = array_search($answer,$items)) !== false){
			unset($items[$key]);	
		}
		shuffle($items);
		$pool = array_slice($items,0,4);
		$pool[]=$answer;
		shuffle($pool);
		$pool = $this->convertNames($pool);
		return $pool;
	}
	
	private function convertNames($pool){
		foreach($pool as $item){
			$hash[]=md5($item).'c';
		}
		
		return $hash;
	}
}
?>