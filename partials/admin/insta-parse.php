<div class="admin-setting-insta-parse-page">
    <input type="password" class="insta-parse-input" placeholder="Type password">
    <select class="insta-parse-select" name="select" >
        <option value="0" default>DEFAULT</option>
        <option value="1">PARSE START</option>
        <option value="2">UPDATE POSTS</option>
    </select>
    <button class="insta-parse-submit" >------RUN------</button>
    <div class="loading-parse"></div>
    <div class="adm-result"></div>
</div>

<style>
@-webkit-keyframes spin {
  	0%{ -webkit-transform: rotate(0deg); tranform: rotate(0deg);}
	100%{ -webkit-transform: rotate(360deg); tranform: rotate(360deg);}
}

.loading-parse {
    display: none;
    position: absolute;
    border-radius: 50%;
    top: 100px;
    left: 50%;
    width:60px;
    height:60px;
    border-top: 2px solid #00ffdc;
    margin: 0 0.5rem;
    animation: spin 1s linear infinite;
}
.loading-active {
    display: inline-block;
}

</style>