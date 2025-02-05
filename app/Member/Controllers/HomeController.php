<?php

namespace App\Member\Controllers;

use SmallRuralDog\Admin\Components\Antv\Area;
use SmallRuralDog\Admin\Components\Antv\Column;
use SmallRuralDog\Admin\Components\Antv\Line;
use SmallRuralDog\Admin\Components\Antv\StepLine;
use SmallRuralDog\Admin\Components\Widgets\Alert;
use SmallRuralDog\Admin\Components\Widgets\Card;
use SmallRuralDog\Admin\Controllers\AdminController;
use SmallRuralDog\Admin\Layout\Content;
use SmallRuralDog\Admin\Layout\Row;

class HomeController extends AdminController
{


    public function index(Content $content)
    {
        $content->className('m-10')
            ->row(function (Row $row) {
                $row->gutter(10);
                $row->column(12, Alert::make("你好，同学！！", "欢迎使用 laravel-vue-admin")->showIcon()->closable(false)->type("success"));
                $row->column(12, Alert::make("你好，同学！！", "欢迎使用 laravel-vue-admin")->showIcon()->closable(false)->type("error"));
            })->row(function (Row $row) {
                $row->gutter(10);
                $row->className('mt-10');
                $row->column(12, Alert::make("你好，同学！！", "欢迎使用 laravel-vue-admin")->showIcon()->closable(false)->type("info"));
                $row->column(12, Alert::make("你好，同学！！", "欢迎使用 laravel-vue-admin")->showIcon()->closable(false)->type("warning"));
            })->row(function (Row $row) {
                $row->gutter(10)->className('mt-10');
                $row->column(12, Card::make()->bodyStyle(['padding' => '0'])->content(
                    Line::make()
                        ->data(function () {
                            $data = collect();
                            for ($year = 2010; $year <= 2020; $year++) {
                                $data->push([
                                    'year' => (string)$year,
                                    'type' => '小红',
                                    'value' => rand(100, 1000)
                                ]);
                                $data->push([
                                    'year' => (string)$year,
                                    'type' => '小白',
                                    'value' => rand(100, 1000)
                                ]);
                            }
                            return $data;
                        })
                        ->config(function () {
                            return [
                                'title' => [
                                    'visible' => true,
                                    'text' => '折线图',
                                ],
                                'description' => [
                                    'visible' => true,
                                    'text' => '他们最常用于表现趋势和关系，而不是传达特定的值。',
                                ],
                                'seriesField' => 'type',
                                'smooth' => true,
                                'xField' => 'year',
                                'yField' => 'value'
                            ];
                        })
                ));
                $row->column(12, Card::make()->bodyStyle(['padding' => '0'])->content(
                    Area::make()
                        ->data(function () {
                            $data = collect();
                            for ($year = 2010; $year <= 2020; $year++) {
                                $data->push([
                                    'year' => (string)$year,
                                    'type' => '小红面积',
                                    'value' => rand(100, 1000)
                                ]);
                                $data->push([
                                    'year' => (string)$year,
                                    'type' => '小白面积',
                                    'value' => rand(100, 1000)
                                ]);
                            }
                            return $data;
                        })
                        ->config(function () {
                            return [
                                'title' => [
                                    'visible' => true,
                                    'text' => '面积图',
                                ],
                                'description' => [
                                    'visible' => true,
                                    'text' => '他们最常用于表现趋势和关系，而不是传达特定的值。',
                                ],
                                'seriesField' => 'type',
                                'smooth' => false,
                                'xField' => 'year',
                                'yField' => 'value'
                            ];
                        })
                ));
            })->row(function (Row $row) {
                $row->gutter(10)->className('mt-10');
                $row->column(12, Card::make()->bodyStyle(['padding' => '0'])->content(
                    StepLine::make()
                        ->data(function () {
                            $data = collect();
                            for ($year = 2010; $year <= 2020; $year++) {
                                $data->push([
                                    'year' => (string)$year,
                                    'type' => '小红面积',
                                    'value' => rand(100, 1000)
                                ]);
                            }
                            return $data;
                        })
                        ->config(function () {
                            return [
                                'title' => [
                                    'visible' => true,
                                    'text' => '阶梯图',
                                ],
                                'description' => [
                                    'visible' => true,
                                    'text' => '阶梯线图用于表示连续时间跨度内的数据',
                                ],
                                'smooth' => false,
                                'xField' => 'year',
                                'yField' => 'value'
                            ];
                        })
                ));
                $row->column(12, Card::make()->bodyStyle(['padding' => '0'])->content(
                    Column::make()
                        ->data(function () {
                            $data = collect();
                            for ($year = 2010; $year <= 2020; $year++) {
                                $data->push([
                                    'year' => (string)$year,
                                    'type' => '小红面积',
                                    'value' => rand(100, 1000)
                                ]);
                            }
                            return $data;
                        })
                        ->config(function () {
                            return [
                                'title' => [
                                    'visible' => true,
                                    'text' => '条形图',
                                ],
                                'description' => [
                                    'visible' => true,
                                    'text' => '条形图即是横向柱状图，相比基础柱状图，条形图的分类文本可以横向排布，因此适合用于分类较多的场景',
                                ],
                                'smooth' => false,
                                'xField' => 'year',
                                'yField' => 'value'
                            ];
                        })
                ));
            });
        return $content;
    }
}

