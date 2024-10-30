<div class="ka-layout">
	<div id="keyword-analyzer">
	  <h2>Pages List</h2>
	  <table id="sortable">
		<thead>
		  <tr>
			<th>
			  &#8470  
			</th>
			<th>
			  Page
			</th>
			<th>
			  Focus Keyphrase
			</th>
			<th>
			  Keyword Synonyms
			</th>
		  </tr>
		</thead>
		<tbody>  	
		  <?php 
			$allPages = get_pages();
			$sortedPages = $allPages;
			
			usort($sortedPages, "keywordanalyzer_titleSorter");
			 $i = 1;
			  foreach($sortedPages as $page) {
				$link = get_permalink($page->ID);
				$keywordSynonmys = get_post_meta($page->ID,'_yoast_wpseo_keywordsynonyms',true);
				$metaKey = get_post_meta($page->ID,'_yoast_wpseo_focuskw',true);
				$page = $page->post_title;
				echo"<tr>
					  <td>
					  	$i
					  </td>
					  <td><a href ='$link' target=”_blank” >$page</a></td>
					  <td class='ka-content'>$metaKey</td>
					  <td><span class ='keywordSynonyms'>$keywordSynonmys</span></td>
					</tr>";
				  $i++;
			  }
			
			function keywordanalyzer_titleSorter($a, $b) {
				return strcmp($a->post_title, $b->post_title);
			}
		  ?>
		</tbody>
	  </table>
	</div>

	<button onclick="generatePDF()" class="button button-primary ka-button">Download as PDF</button>	
</div>	