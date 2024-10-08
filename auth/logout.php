<?php
session_start();
session_destroy();
echo "<script>alert('Berhasil logout dari IT Helpdesk!'); window.location='../index.php';</script>";
