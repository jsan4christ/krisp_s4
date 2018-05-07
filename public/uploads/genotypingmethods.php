<?php
  /***********
  See the NOTICE file distributed with this work for additional
  information regarding copyright ownership.  Licensed under the Apache
  License, Version 2.0 (the "License"); you may not use this file except
  in compliance with the License. You may obtain a copy of the License
  at http://www.apache.org/licenses/LICENSE-2.0 Unless required by
  applicable law or agreed to in writing, software distributed under the
  License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR
  CONDITIONS OF ANY KIND, either express or implied. See the License for
  the specific language governing permissions and limitations under the
  License.
  ***************/
	include("rv-settings.php");
	
	$db = mysql_connect("localhost", "eq9gvt3l_web", "torincaleb14");

	mysql_select_db("eq9gvt3l_bioafric",$db);

	$bioafric = $_GET['pubid'];
	$list =$_GET['list'];

	if ($bioafric) {
		$result1 = mysql_query("SELECT * FROM b_publications WHERE id=$bioafric ORDER BY date ASC",$db);	

		if ($bioafric = mysql_fetch_array($result1)) {
			$id = $bioafric["id"];
			$title = $bioafric["title"];
			$authors = $bioafric["authors"];
			$keywords = $bioafric["keywords"];
			$topdescription = $bioafric["topdescription"];
			$abstract = $bioafric["abstract"];
			$journal = $bioafric["journal"];
			$date = $bioafric["date"];
			$volume = $bioafric["volume"];
			$pages = $bioafric["pages"];
			$citations = $bioafric["citations"];
			$link = $bioafric["link"];
			$datafile = $bioafric["datafile"];
			$file = $bioafric["file"];
			$impact = $bioafric["impact"];
			$pubid = $bioafric["id"];
			
	$title = $title;
	$keywords = $keywords;
	$description = $topdescription1;

	openDocument($title);
	openKeywords($keywords);
	openDescription($topdescription);

	drawHeader($logopicture);
	//	draw_toolbar();
	

          }
       
       echo ' <table class="intro" width="1024">
        <tbody>
          <tr><td>          
       <h2>'.$title.'. '.$journal.', '.$volume.': '.$pages.' ('.$date.').</h2>
			
            </td>
          </tr>
        </tbody>
      </table>
      
      <table class="main" width="1024">
        <tbody>
             <tr>
			<td class="heading">Publication </td>
			<td class="heading2">Latest Publications</td>
		  </tr>
		  <tr><td>
		  
	<table class="main" width="700">
          <tr><td>
            <p>Title: <b>'.$title.'</b><br>
            Authors: <b>'.$authors.'</b>.<br>
            
            Journal: <b>'.$journal.'</b>,'.$volume.':'.$pages.' ('.$date.')<br>';
            
            if ($impact) {
	
		echo '
           <br>Journal Impact Factor (I.F.): <b>'.$impact.'</b><br>';
           
           }
            if ($citations) {
	
		echo '
           
            Number of citations (<small><a href="http://scholar.google.com/scholar?q='.$title.'&hl=en&btnG=Search&as_sdt=1%2C5">Google Scholar</a>)</small>: <b>'.$citations.'</b> <r>';
            }
            
            echo '
          <p><a href="https://twitter.com/share" class="twitter-share-button" data-lang="en">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></p>

             <h2>Abstract</h2>
            '.$abstract.'
            
            ';
           
           if ($file) {
	
		echo '
                        <p><h2>Download: <a href="../manuscripts/'.$file.'.pdf"> Full text paper <img style="border: 0px solid ; width: 28px; height: 42px;" alt="" src="pdf.png"></a></h2></p>
                        <h3><p>Citation:  '.$authors.'. '.$title.' '.$journal.','.$volume.':'.$pages.' ('.$date.').</h3></p>
            
                        ';
           
 
			} 
			
	echo ' 
</td></tr></tbody></table>';	
						   #### IF VIDEO EXIST					

		$result6 = mysql_query("SELECT *  FROM b_resources_video WHERE pubid=$pubid ORDER BY id ASC",$db);	
			
			if ($video = mysql_fetch_array($result6)) {
			$number=mysql_num_rows($result6); 

			do {
				$pict = $video["pict"];
				$title = $video["title"];
				$author = $video["author"];
				$date = $video["date"];
				$duration = $video["duration"];
				$summary = $video["summary"];
				$pubid = $video["pubid"];
				$feature = $video["feature"];
				$file = $video["file"];
				$youtube = $video["youtube"];

				echo '
				    <table class="main">
	        <tbody>
          <tr nosave="">
          	<td class="heading2">Video at YouTube</td>
          </tr>
          <tr>
              <td>
              <p><center><iframe width="560" height="315" src="http://www.youtube.com/embed/'.$youtube.'" frameborder="0"></iframe></p>
			<p><h2>'.$title.'</h2></p>
			<p><h4>Author: '.$author.', Date: '.$date.', Duration: '.$duration.'</h4></p>
            <p><h3><br>For more videos please visit <a href="http://www.youtube.com/user/bioafricaSATURN"> BioAfrica & SATuRN YouTube Channel</a></h3></center></p>
            </td></tr></tbody></table>
            '
            
            ; 
            
				
				
			} while ($video = mysql_fetch_array($result6));

			} else { 
				
			}	

		
	#### IF POWERPOINT EXIST			
	$result3 = mysql_query("SELECT *  FROM b_resources_ppt WHERE pubid=$pubid ORDER BY id ASC",$db);	
			
			if ($resources = mysql_fetch_array($result3)) {
			$number=mysql_num_rows($result3); 
			
			do {
				$pict = $resources["pict"];
				$summary = $resources["summary"];
				$pubid = $resources["pubid"];
				$feature = $resources["feature"];
				$pptfile = $resources["pptfile"];

				echo '
				    <table class="main">
	        <tbody>
          <tr nosave="">
          	<td class="heading2">Summary PowerPoint Presentation</td>
          </tr>
          <tr>
              <td><p><center><a href="manuscripts/ppt/'.$pptfile.'"><img src="manuscripts/ppt/'.$pict.'"  alt="'.$authors.'. '.$title.' .'.$journal.','.$volume.':'.$pages.' ('.$date.')"></p>
            <p><h2>Download: Slide Presentation</h2></p></a></center>
            <p><h4>'.$summary.'</h4></p>
            </td></tr></tbody></table>
            '
            
            ; 
            
				
				
			} while ($resources = mysql_fetch_array($result3));

			} else { 
				
			}	
			
	
			#### IF News EXIST					
	
			$result4 = mysql_query("SELECT *  FROM b_news WHERE pubid=$pubid ORDER BY id ASC",$db);	
			if ($news = mysql_fetch_array($result4)) {
			$number=mysql_num_rows($result4); 
			
echo '      
      <table class="main" width="700">
          <tr>
			<td class="heading2">Printed and Online Media Coverage</td>
		  </tr> <tr><td>
		<table class="main">';
			  
			do {
				$id = $news["id"];
				$title = $news["title"];
				$webpage = $news["webpage"];
				$journal = $news["journal"];
				$date = $news["date"];
				$image = $news["image"];
				$summary = $news["summary"];
				$file = $news["file"];

			echo '

          <tr>
			<td width="120">
          <p><center><img src="imagesBIO/'.$image.'" width=100" heigth="75">
          <h3>'.$journal.'</h3></p></center></td>
          
          <td>
          
          <p><a href="news.php?id='.$id.'"><b>'.$title.'</a></h1></b>
          <h3>'.$journal.'  - '.$date.'</h3><h4>'.$summary.'</h4></p><br>
            </td></tr>
          
          ';					
			} while ($news = mysql_fetch_array($result4));
			echo '</tbody></table></td></tr></tbody></table>';
			} else { 
				
			}	  
			

		   #### IF REPORT EXIST					
	
			$result5 = mysql_query("SELECT *  FROM b_reports WHERE pubid=$pubid ORDER BY id DESC",$db);	



		
		if ($report = mysql_fetch_array($result5)) {

					echo '      
      <table class="main" width="700">
          <tr>
			<td class="heading2">SATuRN/BioAfrica Reports on this Publication</td>
		 </tr>
		 <tr><td>
  
    	    <table class="main"">';
		
		  
			do {
			$id = $report["id"];
			$title = $report["title"];
			$abstract = $report["abstract"];
			$summary = $report["summary"];
			$journal = $report["journal"];
			$date = $report["date"];
			$image = $report["image"];
			$authors = $report["authors"];
			$doi = $report["doi"];
			$bioafrica = $report["bioafricaSATuRN"];


echo'

          <tr>
			<td width="120">
          <p><center><img src="imagesBIO/'.$image.'" width="100" height="75"></p></td>
          
          <td>
          
          <P><a href="report.php?id='.$id.'"> <b>'.$title.'</b></a> 
          <H3>'.$doi.', date: '.$date.' </h3><h1>'.$authors.'  </a></H1></P>
            </td></tr>
          
          ';				
			} while ($report = mysql_fetch_array($result5));

			echo '</tbody></table></tr></td></tbody></table>';
	
			} else {
	
				
			}	



	while ($bioafric = mysql_fetch_array($result1));

				### END INDIVIDUAL Publications WITH ID #########
		
echo '</td><td>';

			
	### START OF PUBLICATION LIST LIMIT 3 #########

		$result4 = mysql_query('SELECT * FROM b_publications WHERE bioafricaSATURN=4 OR  bioafricaSATURN=5 ORDER BY date DESC, id DESC LIMIT 3',$db);	
		
		echo ' 	<table class="intro">';
		
		if ($publications = mysql_fetch_array($result4)) {
		
		  
			do {
			$id = $publications["id"];
			$title = $publications["title"];
			$authors = $publications["authors"];
			$journal = $publications["journal"];
			$date = $publications["date"];
			$volume = $publications["volume"];
			$pages = $publications["pages"];
				echo '

     
          <tr>
          <td>          
          <a href="genotypingmethods.php?pubid='.$id.'"><br><b>'.$title.'</a></h1></b></h4>
          <h5><b>Journal: '.$journal.' ('.$date.') </h5></a>
            </td></tr>
          
          ';				
			} while ($publications = mysql_fetch_array($result4));

		
			} else {
	
	echo 'No news';		
				
			}	
				echo '<tr><td align="right"><a href="genotypingmethods.php"><small>All genotyping methods publications</small></a>...</td></tr></tbody></table>';	
			
			
			### END  OF PUBLICATIONS LIST ######### 

			### START OF TWITTER ######### 
			
echo'<p>
<a class="twitter-timeline" data-dnt="true" href="https://twitter.com/drug_resistance" data-widget-id="287836532994342912">Tweets by @drug_resistance</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?"http":"https";if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
';

echo'

<a href="https://twitter.com/drug_resistance" class="twitter-follow-button" data-show-count="true" data-lang="en">Follow @drug_resistance</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
';


### END OF TWITTER ######### 

echo'</td></tr></table>';
	
			
			
			
### START OF genotypingmethods.php #########
			} else {
			openDocument("Publications: Bioinformatics, genomics and drug resistance peer-reviewed papers on HIV, TB and other pathogens");
			openKeywords("Publications, Bioinformatics, genomics, africa, bioafrica, drug resistance, peer-reviewed, HIV, TB, dastabases, pathogens, publications");
			openDescription("In this section of bioafrica we provide you with publications, manuscripts, papers, on bioinformatics, genomics and drug resistance. HIV, TB and other pathogens publications");

		drawHeader($logopicture);
		$result2 = mysql_query("SELECT *  FROM b_publications WHERE bioafricaSATURN=4 OR  bioafricaSATURN=5 ORDER BY date DESC, id DESC",$db);	
			
		if ($publication = mysql_fetch_array($result2)) {
		$number=mysql_num_rows($result2); 
		$number_citations = get_Total();
		$citations_per_publications = $number_citations/$number;
		$number_Hscore = get_Hscore();
		$number_impact = get_IF();
		$average_impact = $number_impact/$number;
		
		$number_average_impact = number_format($average_impact, 2);
		$number_citations_per_publications = number_format($citations_per_publications, 2);
		
		echo '      
		<table class="intro" width="1024">
        <tbody>
          <tr>
            <td>
            <h2>Protocols for sequencing the HIV whole genome or specific gene fragment using capillary electrophoresis:</h2>

<p>Here we provide detailed full protocols. The protocols are linked to the primary papers in which they were 1st published. You can also access a summary of publications that have used the same protocol and referenced the primary paper. For each protocol there is also a comment section which should be used by users to discuss issues related to implementation of the protocol.</p>

            </td>
          </tr>
        </tbody>
      </table>
      <table class="main" width="1024">
        <tbody>
          <tr>
			<td class="heading2">Protocol name, publication title, journal and authors (ordered by publication date)</td>
			<td class="heading" width="324">Ranked by Impact Factor (I.F) - Top 10</td>
		  </tr>
		  	<tr>	
            <td>
            <table class="main">
		';

			
			do {
				$pubid = $publication["id"];
				$title = $publication["title"];
				$authors = $publication["authors"];
				$journal = $publication["journal"];
				$date = $publication["date"];
				$volume = $publication["volume"];
				$pages = $publication["pages"];
				$citations = $publication["citations"];
				$impact = $publication["impact"];
				$shorttitle =$publication["shorttitle"];


				echo '
            <tr><td width="160">
            <p><center>';
        #### IF VIDEO EXIST					

		$result6 = mysql_query("SELECT *  FROM b_resources_video WHERE pubid=$pubid ORDER BY id ASC",$db);	
			
			echo'
            <br><a href="genotypingmethods.php?pubid='.$pubid.'"><img src="pdf.png" alt="" style="border: 0px solid ; width: 28px; height: 42px;"></a></center></p></td>
            <td>
          <p><h1> <a href="genotypingmethods.php?pubid='.$pubid.'">'.$shorttitle.'</a>  </h1>
          Manuscript: <a href="genotypingmethods.php?pubid='.$pubid.'"><b>'.$title.'.</b></a>
          <br>'.$authors.', <b>'.$journal.'</b>  ('.$date.'), '.$volume.':'.$pages.'</a><br><br>
          </td></tr>';				
			} while ($publication = mysql_fetch_array($result2));

		
			} else {
	
				
			}	
		
		
		
	
		echo '</table></td><td>';

			
	### PUBLICATIONS RANKED BY IMPACT FACTOR ######

		$result4 = mysql_query('SELECT * FROM b_publications WHERE bioafricaSATURN=4 OR  bioafricaSATURN=5 ORDER BY impact DESC LIMIT 10',$db);	
		
		echo ' 	<table class="intro" width="274">';
		
		if ($publications = mysql_fetch_array($result4)) {
		
		  
			do {
			$id = $publications["id"];
			$title = $publications["title"];
			$authors = $publications["authors"];
			$journal = $publications["journal"];
			$date = $publications["date"];
			$volume = $publications["volume"];
			$pages = $publications["pages"];
			$impact = $publications["impact"];

				echo '

     
          <tr>
          <td>          
          <p><a href="genotypingmethods.php?pubid='.$id.'"><b>'.$title.'</a></b>. '.$journal.' ('.$date.'), I.F.:'.$impact.'</p>
            </td></tr>
          
          ';				
			} while ($publications = mysql_fetch_array($result4));

		
			} else {
	
	echo 'No news';		
				
			}	
				echo '</tbody></table>';	
			
			#### PUBLICATIONS RANKED by citation
			
			
			$result4 = mysql_query('SELECT * FROM b_publications WHERE bioafricaSATURN=4 OR  bioafricaSATURN=5 ORDER BY citations DESC LIMIT 10',$db);	
		
		echo ' 	<table class="intro">
		<tr><td class="heading"><center>Ranked by Citations - Top 10</center></td></tr>';
		
		if ($publications = mysql_fetch_array($result4)) {
		
		  
			do {
			$id = $publications["id"];
			$title = $publications["title"];
			$authors = $publications["authors"];
			$journal = $publications["journal"];
			$date = $publications["date"];
			$volume = $publications["volume"];
			$pages = $publications["pages"];
			$citations = $publications["citations"];

				echo '

     
          <tr>
          <td>          
          <p><a href="genotypingmethods.php?pubid='.$id.'"><b>'.$title.'</a></b>. '.$journal.' ('.$date.'), Citations:'.$citations.'</p>
            </td></tr>
          
          ';				
			} while ($publications = mysql_fetch_array($result4));

		
			} else {
	
	echo 'No news';		
				
			}	
				echo '</tbody></table>';	
			

	echo'
			</td></tr></tbody></table>';	
			}
      
      
	drawFooter("Justen Manasa, 2013"); 
	
	closeDocument();
	
		// subroutines

		function get_Total() {
		global $db;
		$resource = mysql_query("SELECT sum(citations) FROM b_publications WHERE bioafricaSATURN=4 OR  bioafricaSATURN=5",$db);
		$number_citations = mysql_result($resource, 0); // only one cell in field
		return $number_citations;
	}

		function get_IF() {
		global $db;
		$resource = mysql_query("SELECT sum(impact) FROM b_publications WHERE bioafricaSATURN=4 OR  bioafricaSATURN=5",$db);
		$number_impact = mysql_result($resource, 0); // only one cell in field
		return $number_impact;
	}
		function get_HScore() {
		global $db;
		$resource = mysql_query("SELECT citations FROM b_publications order by citations DESC",$db);
		$number=mysql_num_rows($resource); 
		$number_Hscore = mysql_result($resource, ($number -($number - $resource)));
		// only one cell in field
		return $number_Hscore;
	}
