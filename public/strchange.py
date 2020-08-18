#!/usr/bin/env python
# -*- coding: utf-8 -*-
import sys

#sys.path.append('/Library/Frameworks/Python.framework/Versions/3.8/lib/python3.8/site-packages/pandas')
#sys.path.append('/Library/Frameworks/Python.framework/Versions/3.8/lib/python3.8/site-packages/pathlib')
#sys.path.append('/Library/Frameworks/Python.framework/Versions/3.8/lib/python3.8/site-packages/janome')
#sys.path.append('/Library/Frameworks/Python.framework/Versions/3.8/lib/python3.8/site-packages/jaconv')

import pandas as pd
import numpy as np
import os
import glob
import pathlib
import re
import janome
import jaconv




from janome.tokenizer import Tokenizer
from janome.analyzer import Analyzer
from janome.charfilter import *
#import numpy as np

#dicというディレクトリにダウンロードしてきた極性辞書を入れておく
#極性辞書をDBにアップロード＆保存しておく
p_dic = pathlib.Path('dic')
posi_nega_df = []
x = []
#(*.txt)をデータベースから評価極性辞書を持ってくるように変更
for i in glob.glob('dic/*.txt'):
    with open (i, 'r') as f:
        #単語・読み仮名・品詞・スコアに分割してリストとして格納
        x = [ii.replace('\n', '').split(':') for ii in  f.readlines()]

posi_nega_df = pd.DataFrame(x, columns = ['基本形', '読み', '品詞', 'スコア'])
#jaconvを使って読み仮名を全てカタカナに変換
posi_nega_df['読み'] = posi_nega_df['読み'].apply(lambda x : jaconv.hira2kata(x))
#なぜか読みや品詞まで同じなのに、異なるスコアが割り当てられていたものがあったので重複を削除
posi_nega_df = posi_nega_df[~posi_nega_df[['基本形', '読み', '品詞']].duplicated()]


p_temp = pathlib.Path('testtext')

article_list = []
article_df = []
#フォルダ内のテキストファイルを全てサーチ
#('text/**/*.txt')をスレッド内の書き込みに対して読み込むように変更
for i in glob.glob("dictext/text.txt"):#読み込む文字列
    with open(i, 'r',encoding="utf-8") as f:
        #テキストファイルの中身を一行ずつ読み込み、リスト形式で格納
        article = f.read()
        #不要な改行等を置換処理
        article = [re.sub(r'[\n \u3000]', '', i) for i in article]
        #ニュースサイト名・記事URL・日付・記事タイトル・本文の並びでリスト化
    article_list.append([''.join(article[0:])])
        
lists = []
for i in article_list:
    lists.append(str(i).replace("[","").replace("]","").replace("'","").split(","))

article_df = pd.DataFrame(lists)







news_df = article_df[0:].reset_index(drop = True)

from janome.tokenizer import Tokenizer
from janome.analyzer import Analyzer
from janome.charfilter import *
import numpy as np

t = Tokenizer()
char_filters = [UnicodeNormalizeCharFilter()]
analyzer = Analyzer(char_filters, t)

word_lists = []
words = []

for i, row in news_df.iterrows():
    for t in analyzer.analyze(row[0]):
        #形態素
        surf = t.surface
        words.append([surf])
        #基本形
        base = t.base_form
        #品詞
        pos = t.part_of_speech
        #読み
        reading = t.reading

word_df = pd.DataFrame(word_lists, columns = ['単語'])
score_result = word_df








for i in glob.glob("dic/dic.txt"):#辞書読み込み
    with open (i, 'r', encoding = 'UTF-8') as f:
        #単語・読み仮名・品詞・スコアに分割してリストとして格納
        doc = [ii.replace('\n', '').split(':') for ii in  f.readlines()]

#形態素解析前の文章を用意、解析後の文章が一致したときにreplace
t = str(score_result["単語"])
text = repr(article_df)
text = text.replace(" ","").replace("\n","").replace("'","").replace('\\x08',"").replace("0","",2)
for d in doc:
    d = str(d[0])
    for w in words:
        w = str(w)
        ww = w.replace("'","")
        ww = ww.replace("[","")
        ww = ww.replace("]","")
        if(ww == d):
            dd = d
            dd = dd.replace("'","")
            dd = dd.replace("[","")
            dd = dd.replace("]","")
            text = text.replace(dd,"■■").replace("0","").replace(" ","")
           

print(text)
#return text