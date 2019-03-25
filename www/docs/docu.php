<?php

header("Content-disposition: attachment; filename=notice.pdf");
header("Content-type: application/pdf");
readfile("notice.pdf");
