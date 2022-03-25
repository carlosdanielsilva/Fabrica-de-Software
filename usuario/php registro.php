<?php

		echo "<form action='registro.php'>";
		echo "<input type='text' placeholder='Insira a data que deseja buscar' name='valor' maxlenght='15' autocomplete='off' required><br><br>";
		echo "<input type='submit' name='buscar' value='Buscar'>";
		echo "<input type='button'  onclick=\"window.location='registro.php';\" value='Apagar filtro'>";
		echo "</form>";

			if (isset($_GET['confirm']))
			{
				$string = "SELECT id FROM monitoramento ORDER BY id";
				$query = mysqli_query($conexao, $string);
				$i = 0;

				while($linha = mysqli_fetch_assoc($query))
				{
					if(isset($_GET['id'.$linha['id']]))
					{
						$queries[$i] = mysqli_query($conexao, "DELETE FROM monitoramento WHERE id = ".$linha['id']);
					}

					$i++;	
				}

				echo "<script>window.location = 'registro.php'</script>";
			}

			$query = mysqli_query($conexao, "SELECT * FROM monitoramento ORDER BY id");

			if (isset($_GET['apagar']))
			{
				echo "<h3>Excluir registros</h3>";
				echo "<form id='apagar' action='registro.php'>";
				echo "<table>";
				echo "<tr>".
						"<td style='background-color:lightblue;'><b>Data</b></td>".
						"<td style='background-color:lightblue;'><b>Glicemia</b></td>".
						"<td style='background-color:lightblue;'><b>Cafe</b></td>".
						"<td style='background-color:lightblue;'><b>Almoço</b></td>".
						"<td style='background-color:lightblue;'><b>Lanche</b></td>".
						"<td style='background-color:lightblue;'><b>Janta</b></td>".
						"<td style='background-color:lightblue;'><b>Exercicio</b></td>".
						"<td style='background-color:lightblue;'><b>Agua</b></td>".
						"<td style='background-color:lightblue;'><b>Peso</b></td>".
						"<td style='background-color:lightblue;'><b>Selecionado</b></td>".
					 "</tr>";

				while($linha = mysqli_fetch_assoc($query))
				{
					echo "<tr>".
							"<td>".$linha['data']."</td>".
							"<td>".$linha['glicemia']."</td>".
							"<td>".$linha['cafe']."</td>".
							"<td>".$linha['almoco']."</td>".
							"<td>".$linha['lanche']."</td>".
							"<td>".$linha['janta']."</td>".
							"<td>".$linha['exercicio']."</td>".
							"<td>".$linha['agua']."</td>".
							"<td>".$linha['peso']."</td>".
							"<td><input type='checkbox' name='id".$linha['id']."'></td>".
						 "</tr>";
				}

				echo "</table><br>";
				echo 	"<input type='submit' value='Confirmar' name='verificar'><br><br>".
						"<input type='button' onclick='javascript:window.history.go(-1)';' value='Voltar'>";
				echo "</form>";
			}
			elseif (isset($_GET['verificar']))
			{
				$string = "SELECT id FROM monitoramento ORDER BY id";
				$query = mysqli_query($conexao, $string);

				echo "<form action='registro.php'>";

				while($linha = mysqli_fetch_assoc($query))
				{
					if(isset($_GET['id'.$linha['id']]))
					{
						echo "<input type='hidden' name='id".$linha['id']."' value='on'>";
					}
				}

				echo "<div class='form'> <h3>Confirmação de exclusão de dados</h3>".
					 "<input type='submit' name='confirm' value='Confirmar'></div>";
			}
			elseif(isset($_GET['buscar']))
			{
				$valor = $_GET['valor'];
				$string = "SELECT * FROM monitoramento WHERE data LIKE '%".$valor."%'";				

				if(mysqli_query($conexao, $string))
				{
					$query = mysqli_query($conexao, $string);

					if (mysqli_num_rows($query) > 0)
					{
						echo "<table>";
						echo "<tr>".
								"<td style='background-color:lightblue;'><b>Data</b></td>".
								"<td style='background-color:lightblue;'><b>Glicemia</b></td>".
								"<td style='background-color:lightblue;'><b>Cafe</b></td>".
								"<td style='background-color:lightblue;'><b>Almoço</b></td>".
								"<td style='background-color:lightblue;'><b>Lanche</b></td>".
								"<td style='background-color:lightblue;'><b>Janta</b></td>".
								"<td style='background-color:lightblue;'><b>Exercicio</b></td>".
								"<td style='background-color:lightblue;'><b>Agua</b></td>".
								"<td style='background-color:lightblue;'><b>Peso</b></td>".
							 "</tr>";

						while($linha = mysqli_fetch_assoc($query))
						{												
							echo "<tr>".
									"<td>".$linha['data']."</td>".
									"<td>".$linha['glicemia']."</td>".
									"<td>".$linha['cafe']."</td>".
									"<td>".$linha['almoco']."</td>".
									"<td>".$linha['lanche']."</td>".
									"<td>".$linha['janta']."</td>".
									"<td>".$linha['exercicio']."</td>".
									"<td>".$linha['agua']."</td>".
									"<td>".$linha['peso']."</td>".
									"</tr>";
						}

						echo "</table><br>";
						echo "<button class='button' onclick=\"window.location='addRegistro.php';\">Adicionar Registros</button>
					 		  <button class='button' onclick=\"window.location='registro.php?apagar=yes';\">Excluir Registros</button>
					  		  <button class='button' onclick=\"window.location='dashboard.php';\">Voltar</button>";
					}
					else
					{
						echo "<script>
									alert('Nenhum valor encontrado!');
									window.location='registros.php';
							  </script>";
					}
				}
				else
				{
					echo "<script>
									alert('Falha na busca de registros!');
									window.location='registros.php';
						  </script>";
				}
			}
			else
			{
				echo "<table>";
				echo "<tr>".
							"<td style='background-color:lightblue;'><b>Data</b></td>".
							"<td style='background-color:lightblue;'><b>Glicemia</b></td>".
							"<td style='background-color:lightblue;'><b>Cafe</b></td>".
							"<td style='background-color:lightblue;'><b>Almoço</b></td>".
							"<td style='background-color:lightblue;'><b>Lanche</b></td>".
							"<td style='background-color:lightblue;'><b>Janta</b></td>".
							"<td style='background-color:lightblue;'><b>Exercicio</b></td>".
							"<td style='background-color:lightblue;'><b>Agua</b></td>".
							"<td style='background-color:lightblue;'><b>Peso</b></td>".
					 "</tr>";

				while($linha = mysqli_fetch_assoc($query))
				{
					echo "<tr>".
							"<td>".$linha['data']."</td>".
							"<td>".$linha['glicemia']."</td>".
							"<td>".$linha['cafe']."</td>".
							"<td>".$linha['almoco']."</td>".
							"<td>".$linha['lanche']."</td>".
							"<td>".$linha['janta']."</td>".
							"<td>".$linha['exercicio']."</td>".
							"<td>".$linha['agua']."</td>".
							"<td>".$linha['peso']."</td>".
						 "</tr>";
				}

				echo "</table><br>";
				echo "<button class='button' onclick=\"window.location='addRegistro.php';\">Adicionar Registros</button>
					  <button class='button' onclick=\"window.location='registro.php?apagar=yes';\">Excluir Registros</button>
					  <button class='button' onclick=\"window.location='dashboard.php';\">Voltar</button>";
			}

		?>