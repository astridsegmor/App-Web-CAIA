
	function isNumeric(char) {
	  return !isNaN(char - parseInt(char));
	};

	//LEER UN NÚMERO Y DARLE UN FORMATO

	document.addEventListener('DOMContentLoaded', function() {
	  applyInputMask('tlfX', '0000-0000000');
	});

	document.addEventListener('DOMContentLoaded', function() {
	  applyInputMask('tlf2', '0000-0000000');
	});

	document.addEventListener('DOMContentLoaded', function() {
	  applyInputMask('tlf3', '0000-0000000');
	});

	document.addEventListener('DOMContentLoaded', function() {
	  applyInputMask('codigoX', '000.000,00');
	});

	document.addEventListener('DOMContentLoaded', function() {
	  applyInputX('numeroX');
	});

	function applyInputX(elementId) {
	  let inputElement = document.getElementById(elementId);
	  let content = '';
//	  let maxChars = numberCharactersPattern(mask);
	  
	  inputElement.addEventListener('keydown', function(e) {
		e.preventDefault();
//		const patron =/^[Vv|Ee]$/;
//		  if (isNaN(e.key) && content.length===0) {
			if (isNumeric(e.key) || e.key==='.') {
			  content = content.toUpperCase() + e.key;
			}
			if(e.keyCode == 8) {
			  if(content.length > 0) {
				content = content.substr(0, content.length - 1);
			  }
			}
			inputElement.value = content;
		  })
	};

	document.addEventListener('DOMContentLoaded', function() {
	  applyInputMask('cedulaB', 'L-00.000.000');
	});

	function applyInputMask(elementId, mask) {
	  let inputElement = document.getElementById(elementId);
	  let content = '';
	  let maxChars = numberCharactersPattern(mask);
	  
	  inputElement.addEventListener('keydown', function(e) {
		e.preventDefault();
		const patron =/^[Vv|Ee]$/;
//		  if (isNaN(e.key) && content.length===0) {
		  if (patron.test(e.key) && (content.length===0) && (elementId == 'cedulaB')) {
			  content += e.key;
		  } else {
			if (isNumeric(e.key) && content.length < maxChars) {
			  content = content.toUpperCase() + e.key;
			}
			if(e.keyCode == 8) {
			  if(content.length > 0) {
				content = content.substr(0, content.length - 1);
			  }
			}
		  }
			inputElement.value = maskIt(mask, content);
		  })
	};

	function maskIt(pattern, value) {
	  let position = 0;
	  let currentChar = 0;
	  let masked = '';
	  while(position < pattern.length && currentChar < value.length) {
		if(pattern[position] === '0' || pattern[position] === 'L'){
		  masked += value[currentChar];
		  currentChar++;
		} else {
		  masked += pattern[position];
		}
		position++;
	  }
	  return masked;
	};

	function numberCharactersPattern(pattern) {
	  let numberChars = 0;
	  for(let i = 0; i < pattern.length; i++) {
		if(pattern[i] === '0' || pattern[i] === 'L') {
		  numberChars ++;
		}
	  }
	  return numberChars;
	};

