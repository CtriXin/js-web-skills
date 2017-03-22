<?php

include 'util/Http.php';
include 'util/Tool.php';
class JD{
    public $cookie;
    const URL_QUERY_COUPON='https://quan.jd.com/user_quan.action?couponType=-1&sort=3&page=';
    const URL_QUERY_COUPON_COUNT='https://quan.jd.com/query_coupon_count.action';
    const URL_QUERY_COUPON_COUNT_POST_DATA='couponType=-1';
    const PER_PAGE_NUM=12;
    const REG_COUPON_DETAIL="/<div class=\"c-type\">
        <div class=\"c-price\">
            <em>&yen;<\/em>
            <strong>(.*?)<\/strong>
        <\/div>
        <div class=\"c-limit\">
            (.*?)
        <\/div>
        <div class=\"c-time\">(.*?)<\/div>
        <div class=\"c-time\">(.*?)<\/div>
        <div class=\"c-type-top\"><\/div>
        <div class=\"c-type-bottom\"><\/div>
    <\/div>

    <div class=\"c-msg\">
        <div class=\"c-range\">
            <div class=\"range-item\">
                <span class=\"label\">(.*?)<\/span>
                <span class=\"txt\">(.*?)<\/span>
                <b class=\"\" style=\"display: inline-block;\"><\/b>
                <div class=\"item-tips\" style=\"display: none;\">
                    <s><\/s>
                    <div class=\"tips\">(.*?)<\/div>
                <\/div>
            <\/div>

            <div class=\"range-item\">
                <span class=\"label\">限平台：<\/span>
                <span class=\"txt\">(.*?)<\/span>
                <b class=\"\" style=\"display: inline-block;\"><\/b>
                <div class=\"item-tips\" style=\"display: none;\">
                    <s><\/s>
                    <div class=\"tips\">(.*?)<\/div>
                <\/div>
            <\/div>

            <div class=\"range-item\">
                <span class=\"label\">券编号：<\/span>
                <span class=\"txt\">(.*?)<\/span>
            <\/div>/i";

    function __construct($cookie)
    {
        $this->cookie=$cookie;
    }

    public function queryCoupon($containStr=''){
        $count=$this->queryCouponCount();
        $pageNum=ceil($count/self::PER_PAGE_NUM);
        echo 'get count',$count,$pageNum;
        $this->queryCouponDetail();
    }
    public function queryCouponDetail($page=1){
        $url=self::URL_QUERY_COUPON.$page;
        $re= Http::post($url,[],$this->cookie);
        $a=[];
        preg_match_all(self::REG_COUPON_DETAIL, $re, $a);
        var_dump($a);
    }
    public function queryCouponCount(){

        $re= Http::post(self::URL_QUERY_COUPON_COUNT,self::URL_QUERY_COUPON_COUNT_POST_DATA,$this->cookie);
        try{
            $obj=json_decode($re);
            return $obj->usableCount;
        }catch (Exception $exception){
            echo 'json_decode err',json_encode($exception);
            return 0;
        }
    }


}