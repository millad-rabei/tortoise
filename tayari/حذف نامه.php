<!DOCTYPE html>
<html>
<head> <meta charset="UTF-8"> </head>
<title>ارجاع مدارک</title>
<body>
<center><h1> حذف نامه </h1></center>
<h2 align="right" >حذف نامه به شماره </h2>
<form action="home.php" method="post">

<fieldset align="right" ><legend align="right" >
<input type="submit" value="حذف اسناد ">
</legend><fieldset align="right" > 


<select name="days">

            <option value="1day"> یک روز گذشته به قبل</option>
            <option value="7day"> یک هفته گذشته به قبل</option>
            <option value="30day"> یک ماه گذشته به قبل</option>
            <option value="365day"> یک سال گذشته به قبل</option>
             </select>
             <t4 align ="right" >: محدوده حذف اسناد </t4>
<br>

<input type="date" name="be-day">
            <t4 align ="right" >: محدوده حذف اسناد قبل از </t4> 
 <br>

<input type="date" name="b0-day">
<input type="date" name="b1-day">

           <t4 align ="right" >: محدوده زمانی حذف اسناد </t4>

<br>
 <select name="zirsisteam">
            <option value="a"  > گردش اطلاعات </option>
             </select>

             <t4 align ="right" >: زیر سیستم </t4>

<br>

<select name="anavin">
            <option value="b"  > مدیر سیستم </option>
             </select>

             <t4 align ="right" >: عناوین </t4>
      <br>

<select name="parvandeha">
            <option value="b"  > بازیافت </option>
             </select>

             <t4 align ="right" >:پرونده ها </t4>

<br>
</fieldset> 


 <form action="contact.php" enctype="multipart/form-data" method="post" style="display: bock">
 <input name="file" type="file" />


<input type="submit" value="اعمال تغییرات">
<input type="submit" value="بررسی تغییرات">
<input type="submit" value="بازگشت">
<input type="submit" value="صفحه اصلی">
</fieldset> 
</form>
</body>
</html>