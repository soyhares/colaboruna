		


			function helloWord(){
				var text = "HOLA MUNDO javascript";
				//document.write(text);
				alert(text);
			}
		
			function getData(){// prompt: pedir valor en pantanlla.
				var solicitarNum = 0;
				solicitarNum = prompt("Ingrese un numero?");
				document.write(parseInt(solicitarNum)+num);
			}

			function counter(){
				var num = 0;
				var solicitarNum = 0;
				solicitarNum = prompt("Ingrese el contador");
				num = solicitarNum;
					while(parseInt(num) != 0 ){
						document.write(parseInt(num) + "</br>");
						num = num - 1;
					}

			}
	
			function greet(seccion){//saludar

				alert("Hola "+ seccion.id);
			}

			function color(element){// poner color

				element.style.backgroundColor="gray";	
			}

			function changeColor(element){// cambiar color

				element.style.backgroundColor="black";
			}

			function restoreColor(element){ // restaurar color

				element.style.backgroundColor="red";	
			}

      		function press(input){// cambiar valor al texto

			   input.value="javascript";  
			}
		
		  function consult(){// consulta
				var result = confirm("Estas seguro?");
				return result;
			}

			function pass(){
				var pagina ="registro.html";
				
					location.href=pagina;
			}

			function messageError(){
				var text = "Invalido!";
				//document.write(text);
				alert(text);
			}


			}
		
		//DOM
		window.onload = funtion()
		{
			heading = document.createElement("h1");
			heading_text = document.createTextNote("Mi primera app con JS");
			heading.appendChild(heading_text);
			document.body.appendChild(heading);
		}
		
		//POO
		function poo(){
			var persona = function(nombre, apellido, edad){
			this.nombre = new String(nombre);
			this.apellido = new String(apellido);
			this.edad = new Number(edad);
			}
			var hares = new persona("Harley","Espinoza",20);
			alert("... "+hares.nombre);
		}
		

				
		
		