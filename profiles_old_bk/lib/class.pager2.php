<?php 
/************************************************************************************** 
* Class: Pager 
* Author: Tsigo <tsigo@tsiris.com> 
* Methods: 
*         findStart 
*         findPages 
*         pageList 
*         nextPrev 
* Redistribute as you see fit.
**************************************************************************************/ 
class Pager1 
  { 
  /*********************************************************************************** 
   * int findStart (int limit) 
   * Returns the start offset based on $_GET['page'] and $limit 
   ***********************************************************************************/ 
   function findStart($limit) 
    { 
     if ((!isset($_GET['page'])) || ($_GET['page'] == "1")) 
      { 
       $start = 0; 
       $_GET['page'] = 1; 
      } 
     else 
      { 
       $start = ($_GET['page']-1) * $limit; 
      } 

     return $start; 
    } 
  /*********************************************************************************** 
   * int findPages (int count, int limit) 
   * Returns the number of pages needed based on a count and a limit 
   ***********************************************************************************/ 
   function findPages($count, $limit) 
    { 
     $pages = (($count % $limit) == 0) ? $count / $limit : floor($count / $limit) + 1; 

     return $pages; 
    } 
  /*********************************************************************************** 
   * string pageList (int curpage, int pages) 
   * Returns a list of pages in the format of " < [pages] > " 
   ***********************************************************************************/ 
   function pageList($curpage, $pages) 
    { 
     $page_list  = ""; 

     /* Print the first and previous page links if necessary */ 
     if (($curpage != 1) && ($curpage)) 
      { 
       //$page_list .= "  <a href=\"".$_SERVER['PHP_SELF']."?page=1 title=\"First Page\" class=\"numbr selected\"></a> "; 
      } 

     if (($curpage-1) > 0) 
      { 
       //$page_list .= " <a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage-1)."\" title=\"Previous Page\"> < </a> "; 
      } 

     /* Print the numeric page list; make the current page unlinked and bold */ 
     for ($i=1; $i<=$pages; $i++) 
      { 
       if ($i == $curpage) 
        { 
         //$page_list .= "<b class=\"numbr selected\">".$i."</b>"; 
		 $page_list .= "<strong>".$i."</strong>";
        } 
       else 
        { 
         $page_list .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".$i."\" title=\"Page ".$i."\">".$i."</a>"; 
        } 
       $page_list .= " "; 
      } 

     /* Print the Next and Last page links if necessary */ 
     if (($curpage+1) <= $pages) 
      { 
       //$page_list .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage+1)."\" title=\"Next Page\"> > </a> "; 
      } 

     if (($curpage != $pages) && ($pages != 0)) 
      { 
       //$page_list .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".$pages."\" title=\"Last Page\"></a> "; 
      } 
     $page_list .= "</td>\n"; 

     return $page_list; 
    } 
  /*********************************************************************************** 
   * string nextPrev (int curpage, int pages) 
   * Returns "Previous | Next" string for individual pagination (it's a word!) 
   ***********************************************************************************/ 
   function nextPrev($curpage, $pages, $qryString) 
    { 
     $next_prev  = ""; 

     if (($curpage-1) <= 0) 
      { 
       $next_prev .= "&nbsp;Previous&nbsp;&nbsp;|"; 
      } 
     else 
      { 
       $next_prev .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage-1).$qryString."\">Previous</a>&nbsp;&nbsp;|"; 
      } 
	/*	
	for ($i=1; $i<=$pages; $i++) 
      { 
       if ($i == $curpage) 
        { 
         $next_prev .= "<b>".$i."</b>"; 
        } 
       else 
        { 
         $next_prev .= "<a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&CatID=".$CatID."&ParentID=".$ParentID."\" title=\"Page ".$i."\">".$i."</a>";
        } 
       $next_prev .= " "; 
      } 
     //$next_prev .= " | "; 
	*/
     if (($curpage+1) > $pages) 
      { 
       $next_prev .= "&nbsp;&nbsp;Next&nbsp;&nbsp;";
      } 
     else 
      { 
       $next_prev .= "&nbsp;&nbsp;<a href=\"".$_SERVER['PHP_SELF']."?page=".($curpage+1).$qryString."\">Next</a>&nbsp;&nbsp;"; 
      } 

     return $next_prev; 
    } 
  }
?> 