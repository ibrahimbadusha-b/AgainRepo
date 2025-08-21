@php
$team = Auth::user()->getAttribute('team');
$teamManager = Auth::user()->getAttribute('teamManager');
@endphp

@if ($team)
<div class="flex flex-wrap items-center justify-between gap-y-4 text-base font-medium leading-normal">
    <div class="lg-w/5-12 w-full md:w-1/2">
        <h2 class="mb-[1em]">{{ __('Active Workspace:') }}</h2>
        <p class="mb-4 font-bold">
            {{ $teamManager->name . ' ' . $teamManager->surname }}
            <x-badge class="ms-2 text-2xs">
                @lang('Team Manager')
            </x-badge>
        </p>

        @lang("You have the Team plan which has a remaining balance of <strong class='font-bold '>:word</strong> words and <strong class='font-bold '>:image</strong> images. You can contact your team manager if you need more credits.", ['word' => Auth::user()->remaining_words, 'image' => Auth::user()->remaining_images])
    </div>
    <div class="ms-auto w-full md:w-1/2">
        <div class="relative">
            <h3 class="absolute start-1/2 top-[calc(50%-5px)] m-0 -translate-x-1/2 text-center text-xs font-normal">
                <strong class="text-[2em] font-semibold leading-none max-sm:text-[1.5em]">
                    @if (Auth::user()->remaining_words == -1)
                    {{ __('Unlimited') }}
                    @else
                    @formatNumber(Auth::user()->remaining_words)
                    @endif
                </strong>
                <br>
                {{ __('Tokens') }}
            </h3>
            <div
                class="relative [&_.apexcharts-legend-text]:!m-0 [&_.apexcharts-legend-text]:!pe-2 [&_.apexcharts-legend-text]:ps-2 [&_.apexcharts-legend-text]:!text-foreground"
                id="chart-credit">
            </div>
        </div>
    </div>
</div>
@else
<h3 class="mb-8">
    @lang('Your Plan')
</h3>

<p class="mb-3 font-medium leading-relaxed text-heading-foreground/60">
    @if (Auth::user()->activePlan() != null)
    {{ __('You have currently') }}
    <strong class="text-heading-foreground">{{ getSubscriptionName() }}</strong>
    {{ __('plan.') }}
    {{ __('Will refill automatically in') }} {{ getSubscriptionDaysLeft() }} {{ __('Days.') }}
    {{ checkIfTrial() == true ? __('You are in Trial time.') : '' }}
    @else
    {{ __('You have no subscription at the moment. Please select a subscription plan or a token pack.') }}
    @endif

    @if ($setting->feature_ai_image)
    {{ __('Total') }}
    <strong class="text-heading-foreground">
        @if (Auth::user()->remaining_words == -1)
        {{ __('Unlimited') }}
        @else
        @formatNumber(Auth::user()->remaining_words)
        @endif
    </strong>
    {{ __('word and') }}
    <strong class="text-heading-foreground">
        @if (Auth::user()->remaining_images == -1)
        {{ __('Unlimited') }}
        @else
        @formatNumber(Auth::user()->remaining_images)
        @endif
    </strong>
    {{ __('image tokens left.') }}
    @else
    {{ __('Total') }}
    <strong class="text-heading-foreground">
        @if (Auth::user()->remaining_words == -1)
        {{ __('Unlimited') }}
        @else
        @formatNumber(Auth::user()->remaining_words)
        @endif
    </strong>
    {{ __('tokens left.') }}
    @endif
</p>

<!-- div > -->
<!-- 
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2">
    <div class=" col-span">
        <div class="lqd-card-body relative only:grow lqd-card-lg"> -->

        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
    <div class="col-span-1">
        <div class="lqd-card-body relative grow lqd-card-lg">

            <div class="relative">
                <!-- <h3 class="absolute pe-8 transform sm:-translate-x-[20em] translate-y-[3em] left-1/2 top-[calc(50%-5px)] m-0 -translate-x-1/2 text-center text-xs font-normal">
                    <strong class="text-[2em] font-semibold leading-none max-sm:text-[1.5em]">
                        Unlimited </strong>
                    <br>
                    Words
                </h3> -->
                <h3 class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center text-xs font-normal 
    sm:text-[1.5em] sm:top-[calc(50%-3em)] md:text-[2em] lg:text-[2.5em]">
    <strong class="font-semibold leading-none">
        Unlimited
    </strong>
    <br>
    Words
</h3>

                <div class="relative [&amp;_.apexcharts-legend-text]:!m-0 [&amp;_.apexcharts-legend-text]:!pe-2 [&amp;_.apexcharts-legend-text]:ps-2 [&amp;_.apexcharts-legend-text]:!text-foreground" id="chart-credit" style="min-height: 176.55px;">
                    <div id="apexcharts5hydahnvl" class="apexcharts-canvas apexcharts5hydahnvl apexcharts-theme-light" style="width: 420px; height: 176.55px;"><svg id="SvgjsSvg1037" width="420" height="176.55" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                            <foreignObject x="0" y="0" width="420" height="176.55">
                            <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom" xmlns="http://www.w3.org/1999/xhtml" style="inset: auto 0px 1px; position: absolute; max-height: 107.5px;">
                        <div class="apexcharts-legend-series" rel="1" seriesname="Remaining" data:collapsed="false" style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="1" data:collapsed="false" style="background: rgb(175,14,14) !important; color: rgb(154, 52, 205); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="1" i="0" data:default-text="Remaining" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: inherit;">Remaining</span></div>
                        <div class="apexcharts-legend-series" rel="2" seriesname="Used" data:collapsed="false" style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="2" data:collapsed="false" style="background: rgba(175,14,14,0.5) !important; color: rgba(154, 52, 205, 0.2); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="2" i="1" data:default-text="Used" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: inherit;">Used</span></div>
                    </div>
                                <style type="text/css">
                                    .apexcharts-legend {
                                        display: flex;
                                        overflow: auto;
                                        padding: 0 10px;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom,
                                    .apexcharts-legend.apx-legend-position-top {
                                        flex-wrap: wrap
                                    }

                                    .apexcharts-legend.apx-legend-position-right,
                                    .apexcharts-legend.apx-legend-position-left {
                                        flex-direction: column;
                                        bottom: 0;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                    .apexcharts-legend.apx-legend-position-right,
                                    .apexcharts-legend.apx-legend-position-left {
                                        justify-content: flex-start;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                        justify-content: center;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                    .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                        justify-content: flex-end;
                                    }

                                    .apexcharts-legend-series {
                                        cursor: pointer;
                                        line-height: normal;
                                    }

                                    .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series,
                                    .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series {
                                        display: flex;
                                        align-items: center;
                                    }

                                    .apexcharts-legend-text {
                                        position: relative;
                                        font-size: 14px;
                                    }

                                    .apexcharts-legend-text *,
                                    .apexcharts-legend-marker * {
                                        pointer-events: none;
                                    }

                                    .apexcharts-legend-marker {
                                        position: relative;
                                        display: inline-block;
                                        cursor: pointer;
                                        margin-right: 3px;
                                        border-style: solid;
                                    }

                                    .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series,
                                    .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
                                        display: inline-block;
                                    }

                                    .apexcharts-legend-series.apexcharts-no-click {
                                        cursor: auto;
                                    }

                                    .apexcharts-legend .apexcharts-hidden-zero-series,
                                    .apexcharts-legend .apexcharts-hidden-null-series {
                                        display: none !important;
                                    }

                                    .apexcharts-inactive-legend {
                                        opacity: 0.45;
                                    }
                                </style>
                            </foreignObject>
                            <g id="SvgjsG1039" class="apexcharts-inner apexcharts-graphical" transform="translate(12, 0)">
                                <defs id="SvgjsDefs1038">
                                    <clipPath id="gridRectMask5hydahnvl">
                                        <rect id="SvgjsRect1040" width="407" height="285" x="-4.5" y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                    </clipPath>
                                    <clipPath id="forecastMask5hydahnvl"></clipPath>
                                    <clipPath id="nonForecastMask5hydahnvl"></clipPath>
                                    <clipPath id="gridRectMarkerMask5hydahnvl">
                                        <rect id="SvgjsRect1041" width="402" height="284" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                    </clipPath>
                                </defs>
                                <g id="SvgjsG1042" class="apexcharts-pie">
                                    <g id="SvgjsG1043" transform="translate(0, 0) scale(1)">
                                        <circle id="SvgjsCircle1044" r="89.30975609756098" cx="199" cy="140" fill="transparent"></circle>
                                        <g id="SvgjsG1045" class="apexcharts-slices">
                                            <g id="SvgjsG1046" class="apexcharts-series apexcharts-pie-series" seriesName="Remaining" rel="1" data:realIndex="0">
                                                <path id="SvgjsPath1047" d="M 71.41463414634146 139.99999999999997 A 127.58536585365854 127.58536585365854 0 0 1 326.5853639104223 139.97773215299796 L 288.30975473729563 139.98441250709857 A 89.30975609756098 89.30975609756098 0 0 0 109.69024390243902 140 L 71.41463414634146 139.99999999999997 z" fill="rgba(175,14,14)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-0" index="0" j="0" data:angle="180" data:startAngle="-90" data:strokeWidth="5" data:value="999999999999" data:pathOrig="M 71.41463414634146 139.99999999999997 A 127.58536585365854 127.58536585365854 0 0 1 326.5853639104223 139.97773215299796 L 288.30975473729563 139.98441250709857 A 89.30975609756098 89.30975609756098 0 0 0 109.69024390243902 140 L 71.41463414634146 139.99999999999997 z" stroke="hsl(var(--background))"></path>
                                            </g>
                                            <g id="SvgjsG1048" class="apexcharts-series apexcharts-pie-series" seriesName="Used" rel="2" data:realIndex="1">
                                                <path id="SvgjsPath1049" d="M 326.5853658536586 140 A 127.58536585365854 127.58536585365854 0 0 1 326.5853639104223 139.97773215299796 L 288.30975473729563 139.98441250709857 A 89.30975609756098 89.30975609756098 0 0 0 288.309756097561 140 L 326.5853658536586 140 z" fill="rgba(154,52,205,0.2)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-1" index="0" j="1" data:angle="0" data:startAngle="90" data:strokeWidth="5" data:value="-999999999899" data:pathOrig="M 326.5853658536586 140 A 127.58536585365854 127.58536585365854 0 0 1 326.5853639104223 139.97773215299796 L 288.30975473729563 139.98441250709857 A 89.30975609756098 89.30975609756098 0 0 0 288.309756097561 140 L 326.5853658536586 140 z" stroke="hsl(var(--background))"></path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                                 </g>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="mt-4 flex flex-wrap items-center justify-center gap-4">
                <div expanded-modal-trigger="expanded-modal-trigger" modal-trigger-variant="ghost-shadow" class="lqd-remaining-credit relative mx-2 flex flex-col gap-3 text-2xs">
                    <div class="lqd-modal lqd-modal-default static" x-data="{
        modalOpen: false,
        toggleModal() {
            			this.modalOpen = !this.modalOpen         }
    }">
                      
                        <template x-teleport="body" data-teleport-template="true">
                            <div class="lqd-modal-modal z-[999] flex items-center justify-center overflow-y-auto overscroll-contain fixed inset-0" x-show="modalOpen" x-transition="" @keyup.escape="modalOpen = false" :class="{ 'hidden': !modalOpen }">
                                <div class="lqd-modal-backdrop fixed inset-0 bg-black/5 backdrop-blur-sm"></div>

                                <div class="lqd-modal-content relative z-[100] max-h-[95vh] min-w-[min(calc(100%-2rem),540px)] rounded-xl bg-background shadow-2xl shadow-black/10 overflow-y-auto" @click.outside="modalOpen = false">
                                    <div class="lqd-modal-head flex flex-wrap items-center gap-3 border-b px-4 py-2 relative">
                                        <h4 class="my-0">Your Credit List</h4>

                                        <button class="lqd-modal-close size-8 ms-auto inline-flex items-center justify-center rounded-lg transition-all hover:bg-foreground/20" type="button" @click.prevent="modalOpen = false">
                                            <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M18 6l-12 12"></path>
                                                <path d="M6 6l12 12"></path>
                                            </svg> </button>
                                    </div>

                                    <div class="lqd-modal-body p-10">
                                        <div class="container p-0" @click.outside="modalOpen = false">
                                            <h3 class="mb-2">Unlock your creativity with credits</h3>
                                            <p class="mb-5">Each credit unlocks powerful AI tools and features designed to enhance your content creation.</p>

                                            <div class="credit-list-partial" id="credit-list-partial-873100">
                                                <div class="grid min-h-[140px] w-full place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
                                                    <svg class="animate-spin text-gray-300" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                                        <path d="M32 3C35.8083 3 39.5794 3.75011 43.0978 5.20749C46.6163 6.66488 49.8132 8.80101 52.5061 11.4939C55.199 14.1868 57.3351 17.3837 58.7925 20.9022C60.2499 24.4206 61 28.1917 61 32C61 35.8083 60.2499 39.5794 58.7925 43.0978C57.3351 46.6163 55.199 49.8132 52.5061 52.5061C49.8132 55.199 46.6163 57.3351 43.0978 58.7925C39.5794 60.2499 35.8083 61 32 61C28.1917 61 24.4206 60.2499 20.9022 58.7925C17.3837 57.3351 14.1868 55.199 11.4939 52.5061C8.801 49.8132 6.66487 46.6163 5.20749 43.0978C3.7501 39.5794 3 35.8083 3 32C3 28.1917 3.75011 24.4206 5.2075 20.9022C6.66489 17.3837 8.80101 14.1868 11.4939 11.4939C14.1868 8.80099 17.3838 6.66487 20.9022 5.20749C24.4206 3.7501 28.1917 3 32 3L32 3Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path class="text-gray-900" d="M32 3C36.5778 3 41.0906 4.08374 45.1692 6.16256C49.2477 8.24138 52.7762 11.2562 55.466 14.9605C58.1558 18.6647 59.9304 22.9531 60.6448 27.4748C61.3591 31.9965 60.9928 36.6232 59.5759 40.9762" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>

                                            <div class="mt-4 border-t pt-3 text-end">
                                                <a @click.prevent="modalOpen = false" class="lqd-btn group inline-flex items-center justify-center gap-1.5 text-xs font-medium rounded-full transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/5 [&amp;[disabled]]:!bg-foreground/10 [&amp;[disabled]]:!text-foreground/35 [&amp;[disabled]]:pointer-events-none lqd-btn-outline outline outline-input-border -outline-offset-1 focus-visible:outline-2 focus-visible:outline-offset-0 focus-visible:outline-secondary lqd-btn-md py-2 px-4 lqd-btn-hover-none" href="#">
                                                    Close
                                                </a>
                                                <a class="lqd-btn group inline-flex items-center justify-center gap-1.5 text-xs font-medium rounded-full transition-all hover:-translate-y-0.5 hover:shadow-xl [&amp;[disabled]]:!bg-foreground/10 [&amp;[disabled]]:!text-foreground/35 [&amp;[disabled]]:pointer-events-none lqd-btn-primary bg-primary text-primary-foreground hover:bg-primary/90 hover:shadow-primary/10 focus-visible:bg-primary/90 focus-visible:shadow-primary/10 lqd-btn-md py-2 px-4 lqd-btn-hover-none" href="https://magicai.liquid-themes.com/dashboard/user/payment">
                                                    Upgrade Plan
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        fetch('https://magicai.liquid-themes.com/dashboard/user/payment/credit-list-partial?cache_key=credit-list-cache-1735560451')
                            .then(response => response.json())
                            .then(data => {
                                let ID1 = '#credit-list-partial-direct-873100';
                                let ID2 = '#credit-list-partial-873100';

                                if (document.querySelector(ID1)) {
                                    document.querySelector(ID1).innerHTML = data.html;
                                }

                                if (document.querySelector(ID2)) {
                                    document.querySelector(ID2).innerHTML = data.html;
                                }
                            });
                    });
                </script>
            </div>
        </div>
    </div>
    <div class="col-span">
    <div class="lqd-card-body relative only:grow lqd-card-lg">

<div class="relative">
<h3 class="absolute pe-8 transform translate-x-[2em] translate-y-[3em] left-1/2 top-[calc(50%-5px)] m-0 -translate-x-1/2 text-center text-xs font-normal">
<strong class="text-[2em] font-semibold leading-none max-sm:text-[1.5em]">
            Unlimited </strong>
        <br>
        Images
    </h3>
    <div class="relative [&amp;_.apexcharts-legend-text]:!m-0 [&amp;_.apexcharts-legend-text]:!pe-2 [&amp;_.apexcharts-legend-text]:ps-2 [&amp;_.apexcharts-legend-text]:!text-foreground" id="chart-credit" style="min-height: 176.55px;">
        <div id="apexcharts5hydahnvl" class="apexcharts-canvas apexcharts5hydahnvl apexcharts-theme-light" style="width: 420px; height: 176.55px;"><svg id="SvgjsSvg1037" width="420" height="176.55" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                <foreignObject x="0" y="0" width="420" height="176.55">
                    <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom" xmlns="http://www.w3.org/1999/xhtml" style="inset: auto 0px 1px; position: absolute; max-height: 107.5px;">
                        <div class="apexcharts-legend-series" rel="1" seriesname="Remaining" data:collapsed="false" style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="1" data:collapsed="false" style="background: rgb(175,14,14) !important; color: rgb(154, 52, 205); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="1" i="0" data:default-text="Remaining" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: inherit;">Remaining</span></div>
                        <div class="apexcharts-legend-series" rel="2" seriesname="Used" data:collapsed="false" style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="2" data:collapsed="false" style="background: rgba(175,14,14,0.5) !important; color: rgba(154, 52, 205, 0.2); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="2" i="1" data:default-text="Used" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: inherit;">Used</span></div>
                    </div>
                    <style type="text/css">
                        .apexcharts-legend {
                            display: flex;
                            overflow: auto;
                            padding: 0 10px;
                        }

                        .apexcharts-legend.apx-legend-position-bottom,
                        .apexcharts-legend.apx-legend-position-top {
                            flex-wrap: wrap
                        }

                        .apexcharts-legend.apx-legend-position-right,
                        .apexcharts-legend.apx-legend-position-left {
                            flex-direction: column;
                            bottom: 0;
                        }

                        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                        .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                        .apexcharts-legend.apx-legend-position-right,
                        .apexcharts-legend.apx-legend-position-left {
                            justify-content: flex-start;
                        }

                        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                        .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                            justify-content: center;
                        }

                        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                        .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                            justify-content: flex-end;
                        }

                        .apexcharts-legend-series {
                            cursor: pointer;
                            line-height: normal;
                        }

                        .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series,
                        .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series {
                            display: flex;
                            align-items: center;
                        }

                        .apexcharts-legend-text {
                            position: relative;
                            font-size: 14px;
                        }

                        .apexcharts-legend-text *,
                        .apexcharts-legend-marker * {
                            pointer-events: none;
                        }

                        .apexcharts-legend-marker {
                            position: relative;
                            display: inline-block;
                            cursor: pointer;
                            margin-right: 3px;
                            border-style: solid;
                        }

                        .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series,
                        .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
                            display: inline-block;
                        }

                        .apexcharts-legend-series.apexcharts-no-click {
                            cursor: auto;
                        }

                        .apexcharts-legend .apexcharts-hidden-zero-series,
                        .apexcharts-legend .apexcharts-hidden-null-series {
                            display: none !important;
                        }

                        .apexcharts-inactive-legend {
                            opacity: 0.45;
                        }
                    </style>
                </foreignObject>
                <g id="SvgjsG1039" class="apexcharts-inner apexcharts-graphical" transform="translate(12, 0)">
                    <defs id="SvgjsDefs1038">
                        <clipPath id="gridRectMask5hydahnvl">
                            <rect id="SvgjsRect1040" width="407" height="285" x="-4.5" y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                        </clipPath>
                        <clipPath id="forecastMask5hydahnvl"></clipPath>
                        <clipPath id="nonForecastMask5hydahnvl"></clipPath>
                        <clipPath id="gridRectMarkerMask5hydahnvl">
                            <rect id="SvgjsRect1041" width="402" height="284" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                        </clipPath>
                    </defs>
                    <g id="SvgjsG1042" class="apexcharts-pie">
                        <g id="SvgjsG1043" transform="translate(0, 0) scale(1)">
                            <circle id="SvgjsCircle1044" r="89.30975609756098" cx="199" cy="140" fill="transparent"></circle>
                            <g id="SvgjsG1045" class="apexcharts-slices">
                                <g id="SvgjsG1046" class="apexcharts-series apexcharts-pie-series" seriesName="Remaining" rel="1" data:realIndex="0">
                                    <path id="SvgjsPath1047" d="M 71.41463414634146 139.99999999999997 A 127.58536585365854 127.58536585365854 0 0 1 326.5853639104223 139.97773215299796 L 288.30975473729563 139.98441250709857 A 89.30975609756098 89.30975609756098 0 0 0 109.69024390243902 140 L 71.41463414634146 139.99999999999997 z" fill="rgba(175,14,14)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-0" index="0" j="0" data:angle="180" data:startAngle="-90" data:strokeWidth="5" data:value="999999999999" data:pathOrig="M 71.41463414634146 139.99999999999997 A 127.58536585365854 127.58536585365854 0 0 1 326.5853639104223 139.97773215299796 L 288.30975473729563 139.98441250709857 A 89.30975609756098 89.30975609756098 0 0 0 109.69024390243902 140 L 71.41463414634146 139.99999999999997 z" stroke="hsl(var(--background))"></path>
                                </g>
                                <g id="SvgjsG1048" class="apexcharts-series apexcharts-pie-series" seriesName="Used" rel="2" data:realIndex="1">
                                    <path id="SvgjsPath1049" d="M 326.5853658536586 140 A 127.58536585365854 127.58536585365854 0 0 1 326.5853639104223 139.97773215299796 L 288.30975473729563 139.98441250709857 A 89.30975609756098 89.30975609756098 0 0 0 288.309756097561 140 L 326.5853658536586 140 z" fill="rgba(154,52,205,0.2)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-1" index="0" j="1" data:angle="0" data:startAngle="90" data:strokeWidth="5" data:value="-999999999899" data:pathOrig="M 326.5853658536586 140 A 127.58536585365854 127.58536585365854 0 0 1 326.5853639104223 139.97773215299796 L 288.30975473729563 139.98441250709857 A 89.30975609756098 89.30975609756098 0 0 0 288.309756097561 140 L 326.5853658536586 140 z" stroke="hsl(var(--background))"></path>
                                </g>
                            </g>
                        </g>
                    </g>
                     </g>
            </svg>
        </div>
    </div>
</div>

<div class="mt-4 flex flex-wrap items-center justify-center gap-4">
    <div expanded-modal-trigger="expanded-modal-trigger" modal-trigger-variant="ghost-shadow" class="lqd-remaining-credit relative mx-2 flex flex-col gap-3 text-2xs">
        <div class="lqd-modal lqd-modal-default static" x-data="{
modalOpen: false,
toggleModal() {
            this.modalOpen = !this.modalOpen         }
}">
          
            <template x-teleport="body" data-teleport-template="true">
                <div class="lqd-modal-modal z-[999] flex items-center justify-center overflow-y-auto overscroll-contain fixed inset-0" x-show="modalOpen" x-transition="" @keyup.escape="modalOpen = false" :class="{ 'hidden': !modalOpen }">
                    <div class="lqd-modal-backdrop fixed inset-0 bg-black/5 backdrop-blur-sm"></div>

                    <div class="lqd-modal-content relative z-[100] max-h-[95vh] min-w-[min(calc(100%-2rem),540px)] rounded-xl bg-background shadow-2xl shadow-black/10 overflow-y-auto" @click.outside="modalOpen = false">
                        <div class="lqd-modal-head flex flex-wrap items-center gap-3 border-b px-4 py-2 relative">
                            <h4 class="my-0">Your Credit List</h4>

                            <button class="lqd-modal-close size-8 ms-auto inline-flex items-center justify-center rounded-lg transition-all hover:bg-foreground/20" type="button" @click.prevent="modalOpen = false">
                                <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 6l-12 12"></path>
                                    <path d="M6 6l12 12"></path>
                                </svg> </button>
                        </div>

                        <div class="lqd-modal-body p-10">
                            <div class="container p-0" @click.outside="modalOpen = false">
                                <h3 class="mb-2">Unlock your creativity with credits</h3>
                                <p class="mb-5">Each credit unlocks powerful AI tools and features designed to enhance your content creation.</p>

                                <div class="credit-list-partial" id="credit-list-partial-873100">
                                    <div class="grid min-h-[140px] w-full place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
                                        <svg class="animate-spin text-gray-300" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                            <path d="M32 3C35.8083 3 39.5794 3.75011 43.0978 5.20749C46.6163 6.66488 49.8132 8.80101 52.5061 11.4939C55.199 14.1868 57.3351 17.3837 58.7925 20.9022C60.2499 24.4206 61 28.1917 61 32C61 35.8083 60.2499 39.5794 58.7925 43.0978C57.3351 46.6163 55.199 49.8132 52.5061 52.5061C49.8132 55.199 46.6163 57.3351 43.0978 58.7925C39.5794 60.2499 35.8083 61 32 61C28.1917 61 24.4206 60.2499 20.9022 58.7925C17.3837 57.3351 14.1868 55.199 11.4939 52.5061C8.801 49.8132 6.66487 46.6163 5.20749 43.0978C3.7501 39.5794 3 35.8083 3 32C3 28.1917 3.75011 24.4206 5.2075 20.9022C6.66489 17.3837 8.80101 14.1868 11.4939 11.4939C14.1868 8.80099 17.3838 6.66487 20.9022 5.20749C24.4206 3.7501 28.1917 3 32 3L32 3Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path class="text-gray-900" d="M32 3C36.5778 3 41.0906 4.08374 45.1692 6.16256C49.2477 8.24138 52.7762 11.2562 55.466 14.9605C58.1558 18.6647 59.9304 22.9531 60.6448 27.4748C61.3591 31.9965 60.9928 36.6232 59.5759 40.9762" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round">
                                            </path>
                                        </svg>
                                    </div>
                                </div>

                                <div class="mt-4 border-t pt-3 text-end">
                                    <a @click.prevent="modalOpen = false" class="lqd-btn group inline-flex items-center justify-center gap-1.5 text-xs font-medium rounded-full transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/5 [&amp;[disabled]]:!bg-foreground/10 [&amp;[disabled]]:!text-foreground/35 [&amp;[disabled]]:pointer-events-none lqd-btn-outline outline outline-input-border -outline-offset-1 focus-visible:outline-2 focus-visible:outline-offset-0 focus-visible:outline-secondary lqd-btn-md py-2 px-4 lqd-btn-hover-none" href="#">
                                        Close
                                    </a>
                                    <a class="lqd-btn group inline-flex items-center justify-center gap-1.5 text-xs font-medium rounded-full transition-all hover:-translate-y-0.5 hover:shadow-xl [&amp;[disabled]]:!bg-foreground/10 [&amp;[disabled]]:!text-foreground/35 [&amp;[disabled]]:pointer-events-none lqd-btn-primary bg-primary text-primary-foreground hover:bg-primary/90 hover:shadow-primary/10 focus-visible:bg-primary/90 focus-visible:shadow-primary/10 lqd-btn-md py-2 px-4 lqd-btn-hover-none" href="https://magicai.liquid-themes.com/dashboard/user/payment">
                                        Upgrade Plan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('https://magicai.liquid-themes.com/dashboard/user/payment/credit-list-partial?cache_key=credit-list-cache-1735560451')
                .then(response => response.json())
                .then(data => {
                    let ID1 = '#credit-list-partial-direct-873100';
                    let ID2 = '#credit-list-partial-873100';

                    if (document.querySelector(ID1)) {
                        document.querySelector(ID1).innerHTML = data.html;
                    }

                    if (document.querySelector(ID2)) {
                        document.querySelector(ID2).innerHTML = data.html;
                    }
                });
        });
    </script>
</div>
    </div>
    </div>
</div>
<!-- <div class="relative row">
    <h3 class="absolute left-1/2 top-[calc(50%-5px)] m-0 -translate-x-1/2 text-center text-xs font-normal d-inline-block" style="display: inline-block; vertical-align:top; padding-bottom: 250px;">
        <strong class="text-[1em] font-semibold leading-none max-sm:text-[1.5em]"> -->

            <!-- <div class="lqd-card text-card-foreground transition-all group/card lqd-card-outline border border-card-border lqd-card-roundness-default rounded-xl lg:w-[48%] w-full text-center" id="plan">
                        <div class="relative [&amp;_.apexcharts-legend-text]:!m-0 [&amp;_.apexcharts-legend-text]:!pe-2 [&amp;_.apexcharts-legend-text]:ps-2 [&amp;_.apexcharts-legend-text]:!text-foreground" id="chart-credit" style="min-height: 176.55px;">
                            <div id="apexchartsmgxx67ro" class="apexcharts-canvas apexchartsmgxx67ro apexcharts-theme-light" style="width: 420px; height: 176.55px;"><svg id="SvgjsSvg1171" width="420" height="176.55" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                    <foreignObject x="0" y="0" width="420" height="176.55">
                                        <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom" xmlns="http://www.w3.org/1999/xhtml" style="inset: auto 0px 1px;position: absolute;te; */max-height: 107.5px;">
                                            <div class="apexcharts-legend-series" rel="1" seriesname="Remaining" data:collapsed="false" style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="1" data:collapsed="false" style="background: rgb(153, 21, 21) !important; color: rgb(153, 21, 21); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="1" i="0" data:default-text="Remaining" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: inherit;">Remaining</span></div>
                                            <div class="apexcharts-legend-series" rel="2" seriesname="Used" data:collapsed="false" style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="2" data:collapsed="false" style="background: rgba(153, 6, 6, 0.2) !important; color: rgba(153, 6, 6, 0.2); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="2" i="1" data:default-text="Used" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: inherit;">Used</span></div>
                                        </div>
                                        <style type="text/css">
                                            .apexcharts-legend {
                                                display: flex;
                                                overflow: auto;
                                                padding: 0 10px;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom,
                                            .apexcharts-legend.apx-legend-position-top {
                                                flex-wrap: wrap
                                            }

                                            .apexcharts-legend.apx-legend-position-right,
                                            .apexcharts-legend.apx-legend-position-left {
                                                flex-direction: column;
                                                bottom: 0;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                            .apexcharts-legend.apx-legend-position-right,
                                            .apexcharts-legend.apx-legend-position-left {
                                                justify-content: flex-start;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                                justify-content: center;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                            .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                                justify-content: flex-end;
                                            }

                                            .apexcharts-legend-series {
                                                cursor: pointer;
                                                line-height: normal;
                                            }

                                            .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series,
                                            .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series {
                                                display: flex;
                                                align-items: center;
                                            }

                                            .apexcharts-legend-text {
                                                position: relative;
                                                font-size: 14px;
                                            }

                                            .apexcharts-legend-text *,
                                            .apexcharts-legend-marker * {
                                                pointer-events: none;
                                            }

                                            .apexcharts-legend-marker {
                                                position: relative;
                                                display: inline-block;
                                                cursor: pointer;
                                                margin-right: 3px;
                                                border-style: solid;
                                            }

                                            .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series,
                                            .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
                                                display: inline-block;
                                            }

                                            .apexcharts-legend-series.apexcharts-no-click {
                                                cursor: auto;
                                            }

                                            .apexcharts-legend .apexcharts-hidden-zero-series,
                                            .apexcharts-legend .apexcharts-hidden-null-series {
                                                display: none !important;
                                            }

                                            .apexcharts-inactive-legend {
                                                opacity: 0.45;
                                            }
                                        </style>
                                    </foreignObject>
                                    <g id="SvgjsG1173" class="apexcharts-inner apexcharts-graphical" transform="translate(12, 0)">
                                        <defs id="SvgjsDefs1172">
                                            <clipPath id="gridRectMaskmgxx67ro">
                                                <rect id="SvgjsRect1174" width="407" height="285" x="-4.5" y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="forecastMaskmgxx67ro"></clipPath>
                                            <clipPath id="nonForecastMaskmgxx67ro"></clipPath>
                                            <clipPath id="gridRectMarkerMaskmgxx67ro">
                                                <rect id="SvgjsRect1175" width="402" height="284" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <filter id="SvgjsFilter1183" filterUnits="userSpaceOnUse" width="200%" height="200%" x="-50%" y="-50%">
                                                <feComponentTransfer id="SvgjsFeComponentTransfer1184" result="SvgjsFeComponentTransfer1184Out" in="SourceGraphic">
                                                    <feFuncR id="SvgjsFeFuncR1185" type="linear" slope="0.5"></feFuncR>
                                                    <feFuncG id="SvgjsFeFuncG1186" type="linear" slope="0.5"></feFuncG>
                                                    <feFuncB id="SvgjsFeFuncB1187" type="linear" slope="0.5"></feFuncB>
                                                    <feFuncA id="SvgjsFeFuncA1188" type="identity"></feFuncA>
                                                </feComponentTransfer>
                                            </filter>
                                        </defs>
                                        <g id="SvgjsG1176" class="apexcharts-pie">
                                            <g id="SvgjsG1177" transform="translate(0, 0) scale(1)">
                                                <circle id="SvgjsCircle1178" r="89.30975609756098" cx="199" cy="140" fill="transparent"></circle>
                                                <g id="SvgjsG1179" class="apexcharts-slices">
                                                    <g id="SvgjsG1180" class="apexcharts-series apexcharts-pie-series" seriesName="Remaining" rel="1" data:realIndex="0">
                                                        <path id="SvgjsPath1181" d="M 67.41463414634146 139.99999999999997 A 131.58536585365854 131.58536585365854 0 0 1 330.58536384949883 139.9770340213007 L 288.30975473729563 139.98441250709857 A 89.30975609756098 89.30975609756098 0 0 0 109.69024390243902 140 L 67.41463414634146 139.99999999999997 z" fill="rgb(153, 15, 15)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-0" index="0" j="0" selected="true" filter="url(#SvgjsFilter1183)" data:angle="180" data:startAngle="-90" data:strokeWidth="5" data:value="999999999999" data:pathOrig="M 71.41463414634146 139.99999999999997 A 127.58536585365854 127.58536585365854 0 0 1 326.5853639104223 139.97773215299796 L 288.30975473729563 139.98441250709857 A 89.30975609756098 89.30975609756098 0 0 0 109.69024390243902 140 L 71.41463414634146 139.99999999999997 z" stroke="hsl(var(--background))" data:pieClicked="true"></path>
                                                    </g>
                                                    <g id="SvgjsG1189" class="apexcharts-series apexcharts-pie-series" seriesName="Used" rel="2" data:realIndex="1">
                                                        <path id="SvgjsPath1190" d="M 326.5853658536586 140 A 127.58536585365854 127.58536585365854 0 0 1 326.5853639104223 139.97773215299796 L 288.30975473729563 139.98441250709857 A 89.30975609756098 89.30975609756098 0 0 0 288.309756097561 140 L 326.5853658536586 140 z" fill="rgba(154,52,205,0.2)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-1" index="0" j="1" data:angle="0" data:startAngle="90" data:strokeWidth="5" data:value="-999999999899" data:pathOrig="M 326.5853658536586 140 A 127.58536585365854 127.58536585365854 0 0 1 326.5853639104223 139.97773215299796 L 288.30975473729563 139.98441250709857 A 89.30975609756098 89.30975609756098 0 0 0 288.309756097561 140 L 326.5853658536586 140 z" stroke="hsl(var(--background))"></path>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                        <line id="SvgjsLine1191" x1="0" y1="0" x2="398" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine1192" x1="0" y1="0" x2="398" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line>
                                    </g>
                                </svg>
                                <div class="apexcharts-tooltip apexcharts-theme-dark apexcharts-active" style="left: -31.5625px; top: 142.5px;">
                                    <div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex; background-color: rgb(153, 19, 19);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(151, 8, 8); display: none;"></span>
                                        <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Remaining: </span><span class="apexcharts-tooltip-text-y-value">999999999999</span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                    <div class="apexcharts-tooltip-series-group" style="order: 2; display: none; background-color: rgb(153, 15, 15);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(151, 16, 16); display: none;"></span>
                                        <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Remaining: </span><span class="apexcharts-tooltip-text-y-value">999999999999</span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 flex flex-wrap items-center justify-center gap-4">
                        <div expanded-modal-trigger="expanded-modal-trigger" modal-trigger-variant="ghost-shadow" class="lqd-remaining-credit relative mx-2 flex flex-col gap-3 text-2xs">
                            <div class="lqd-modal lqd-modal-default static" x-data="{
        modalOpen: false,
        toggleModal() {
            			this.modalOpen = !this.modalOpen         }
    }">
                                <a class="lqd-btn group inline-flex items-center justify-center gap-1.5 text-xs font-medium rounded-full transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/5 [&amp;[disabled]]:!bg-foreground/10 [&amp;[disabled]]:!text-foreground/35 [&amp;[disabled]]:pointer-events-none lqd-btn-ghost-shadow bg-background text-foreground shadow-xs hover:bg-primary hover:text-primary-foreground dark:hover:bg-foreground dark:hover:text-background focus-visible:bg-primary focus-visible:text-primary-foreground dark:bg-foreground/[3%] dark:focus-visible:bg-foreground dark:focus-visible:text-background lqd-btn-md py-2 px-4 lqd-btn-hover-none" @click.prevent="toggleModal()" href="">
                                    View Your Credits
                                </a>
                                <template x-teleport="body" data-teleport-template="true">
                                    <div class="lqd-modal-modal z-[999] flex items-center justify-center overflow-y-auto overscroll-contain fixed inset-0" x-show="modalOpen" x-transition="" @keyup.escape="modalOpen = false" :class="{ 'hidden': !modalOpen }">
                                        <div class="lqd-modal-backdrop fixed inset-0 bg-black/5 backdrop-blur-sm"></div>

                                        <div class="lqd-modal-content relative z-[100] max-h-[95vh] min-w-[min(calc(100%-2rem),540px)] rounded-xl bg-background shadow-2xl shadow-black/10 overflow-y-auto" @click.outside="modalOpen = false">
                                            <div class="lqd-modal-head flex flex-wrap items-center gap-3 border-b px-4 py-2 relative">
                                                <h4 class="my-0">Your Credit List</h4>

                                                <button class="lqd-modal-close size-8 ms-auto inline-flex items-center justify-center rounded-lg transition-all hover:bg-foreground/20" type="button" @click.prevent="modalOpen = false">
                                                    <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M18 6l-12 12"></path>
                                                        <path d="M6 6l12 12"></path>
                                                    </svg> </button>
                                            </div>

                                            <div class="lqd-modal-body p-10">
                                                <div class="container p-0" @click.outside="modalOpen = false">
                                                    <h3 class="mb-2">Unlock your creativity with credits</h3>
                                                    <p class="mb-5">Each credit unlocks powerful AI tools and features designed to enhance your content creation.</p>

                                                    <div class="credit-list-partial" id="credit-list-partial-188011">
                                                        <div class="grid min-h-[140px] w-full place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
                                                            <svg class="animate-spin text-gray-300" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                                                <path d="M32 3C35.8083 3 39.5794 3.75011 43.0978 5.20749C46.6163 6.66488 49.8132 8.80101 52.5061 11.4939C55.199 14.1868 57.3351 17.3837 58.7925 20.9022C60.2499 24.4206 61 28.1917 61 32C61 35.8083 60.2499 39.5794 58.7925 43.0978C57.3351 46.6163 55.199 49.8132 52.5061 52.5061C49.8132 55.199 46.6163 57.3351 43.0978 58.7925C39.5794 60.2499 35.8083 61 32 61C28.1917 61 24.4206 60.2499 20.9022 58.7925C17.3837 57.3351 14.1868 55.199 11.4939 52.5061C8.801 49.8132 6.66487 46.6163 5.20749 43.0978C3.7501 39.5794 3 35.8083 3 32C3 28.1917 3.75011 24.4206 5.2075 20.9022C6.66489 17.3837 8.80101 14.1868 11.4939 11.4939C14.1868 8.80099 17.3838 6.66487 20.9022 5.20749C24.4206 3.7501 28.1917 3 32 3L32 3Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path class="text-gray-900" d="M32 3C36.5778 3 41.0906 4.08374 45.1692 6.16256C49.2477 8.24138 52.7762 11.2562 55.466 14.9605C58.1558 18.6647 59.9304 22.9531 60.6448 27.4748C61.3591 31.9965 60.9928 36.6232 59.5759 40.9762" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round">
                                                                </path>
                                                            </svg>
                                                        </div>
                                                    </div>

                                                    <div class="mt-4 border-t pt-3 text-end">
                                                        <a @click.prevent="modalOpen = false" class="lqd-btn group inline-flex items-center justify-center gap-1.5 text-xs font-medium rounded-full transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/5 [&amp;[disabled]]:!bg-foreground/10 [&amp;[disabled]]:!text-foreground/35 [&amp;[disabled]]:pointer-events-none lqd-btn-outline outline outline-input-border -outline-offset-1 focus-visible:outline-2 focus-visible:outline-offset-0 focus-visible:outline-secondary lqd-btn-md py-2 px-4 lqd-btn-hover-none" href="#">
                                                            Close
                                                        </a>
                                                        <a class="lqd-btn group inline-flex items-center justify-center gap-1.5 text-xs font-medium rounded-full transition-all hover:-translate-y-0.5 hover:shadow-xl [&amp;[disabled]]:!bg-foreground/10 [&amp;[disabled]]:!text-foreground/35 [&amp;[disabled]]:pointer-events-none lqd-btn-primary bg-danger text-danger-foreground hover:bg-danger/90 hover:shadow-danger/10 focus-visible:bg-primary/90 focus-visible:shadow-danger/10 lqd-btn-md py-2 px-4 lqd-btn-hover-none" href="https://ai.genmarvel.com/dashboard/user/payment">
                                                            Upgrade Plan
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                        <a class="lqd-btn group inline-flex items-center justify-center gap-1.5 text-xs font-medium rounded-full transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/5 [&amp;[disabled]]:!bg-foreground/10 [&amp;[disabled]]:!text-foreground/35 [&amp;[disabled]]:pointer-events-none lqd-btn-ghost-shadow bg-background text-foreground shadow-xs hover:text-primary-foreground dark:hover:bg-foreground dark:hover:text-background focus-visible:bg-primary focus-visible:text-primary-foreground dark:bg-foreground/[3%] dark:focus-visible:bg-foreground dark:focus-visible:text-background lqd-btn-md py-2 px-4 lqd-btn-hover-none hover:bg-primary" data-name="select_plan" href="https://magicai.liquid-themes.com/dashboard/user/payment">
                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 5l0 14"></path>
                                <path d="M5 12l14 0"></path>
                            </svg> Select a Plan
                        </a>

                    </div>
                </div> -->

            <!-- <div class="lqd-card-body relative only:grow lqd-card-lg py-20 px-10">

                <div class="relative">
                    <h3 class="absolute left-1/2 top-[calc(50%-5px)] m-0 -translate-x-1/2 text-center text-xs font-normal">
                        <strong class="text-[2em] font-semibold leading-none max-sm:text-[1.5em]">
                            Unlimited </strong>
                        <br>
                        Words
                    </h3>
                    <div class="relative [&amp;_.apexcharts-legend-text]:!m-0 [&amp;_.apexcharts-legend-text]:!pe-2 [&amp;_.apexcharts-legend-text]:ps-2 [&amp;_.apexcharts-legend-text]:!text-foreground" id="chart-credit" style="min-height: 176.55px;">
                        <div id="apexchartstg96f6j9" class="apexcharts-canvas apexchartstg96f6j9 apexcharts-theme-light" style="width: 420px; height: 176.55px;"><svg id="SvgjsSvg1037" width="420" height="176.55" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;">
                                <foreignObject x="0" y="0" width="420" height="176.55">
                                    <div class="apexcharts-legend apexcharts-align-center apx-legend-position-bottom" xmlns="http://www.w3.org/1999/xhtml" style="inset: auto 0px 1px; position: absolute; max-height: 107.5px;">
                                        <div class="apexcharts-legend-series" rel="1" seriesname="Remaining" data:collapsed="false" style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="1" data:collapsed="false" style="background: rgb(154, 52, 205) !important; color: rgb(154, 52, 205); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="1" i="0" data:default-text="Remaining" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: inherit;">Remaining</span></div>
                                        <div class="apexcharts-legend-series" rel="2" seriesname="Used" data:collapsed="false" style="margin: 2px 5px;"><span class="apexcharts-legend-marker" rel="2" data:collapsed="false" style="background: rgba(154, 52, 205, 0.2) !important; color: rgba(154, 52, 205, 0.2); height: 12px; width: 12px; left: 0px; top: 0px; border-width: 0px; border-color: rgb(255, 255, 255); border-radius: 12px;"></span><span class="apexcharts-legend-text" rel="2" i="1" data:default-text="Used" data:collapsed="false" style="color: rgb(55, 61, 63); font-size: 12px; font-weight: 400; font-family: inherit;">Used</span></div>
                                    </div>
                                    <style type="text/css">
                                        .apexcharts-legend {
                                            display: flex;
                                            overflow: auto;
                                            padding: 0 10px;
                                        }

                                        .apexcharts-legend.apx-legend-position-bottom,
                                        .apexcharts-legend.apx-legend-position-top {
                                            flex-wrap: wrap
                                        }

                                        .apexcharts-legend.apx-legend-position-right,
                                        .apexcharts-legend.apx-legend-position-left {
                                            flex-direction: column;
                                            bottom: 0;
                                        }

                                        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-left,
                                        .apexcharts-legend.apx-legend-position-top.apexcharts-align-left,
                                        .apexcharts-legend.apx-legend-position-right,
                                        .apexcharts-legend.apx-legend-position-left {
                                            justify-content: flex-start;
                                        }

                                        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-center,
                                        .apexcharts-legend.apx-legend-position-top.apexcharts-align-center {
                                            justify-content: center;
                                        }

                                        .apexcharts-legend.apx-legend-position-bottom.apexcharts-align-right,
                                        .apexcharts-legend.apx-legend-position-top.apexcharts-align-right {
                                            justify-content: flex-end;
                                        }

                                        .apexcharts-legend-series {
                                            cursor: pointer;
                                            line-height: normal;
                                        }

                                        .apexcharts-legend.apx-legend-position-bottom .apexcharts-legend-series,
                                        .apexcharts-legend.apx-legend-position-top .apexcharts-legend-series {
                                            display: flex;
                                            align-items: center;
                                        }

                                        .apexcharts-legend-text {
                                            position: relative;
                                            font-size: 14px;
                                        }

                                        .apexcharts-legend-text *,
                                        .apexcharts-legend-marker * {
                                            pointer-events: none;
                                        }

                                        .apexcharts-legend-marker {
                                            position: relative;
                                            display: inline-block;
                                            cursor: pointer;
                                            margin-right: 3px;
                                            border-style: solid;
                                        }

                                        .apexcharts-legend.apexcharts-align-right .apexcharts-legend-series,
                                        .apexcharts-legend.apexcharts-align-left .apexcharts-legend-series {
                                            display: inline-block;
                                        }

                                        .apexcharts-legend-series.apexcharts-no-click {
                                            cursor: auto;
                                        }

                                        .apexcharts-legend .apexcharts-hidden-zero-series,
                                        .apexcharts-legend .apexcharts-hidden-null-series {
                                            display: none !important;
                                        }

                                        .apexcharts-inactive-legend {
                                            opacity: 0.45;
                                        }
                                    </style>
                                </foreignObject>
                                <g id="SvgjsG1039" class="apexcharts-inner apexcharts-graphical" transform="translate(12, 0)">
                                    <defs id="SvgjsDefs1038">
                                        <clipPath id="gridRectMasktg96f6j9">
                                            <rect id="SvgjsRect1040" width="407" height="285" x="-4.5" y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMasktg96f6j9"></clipPath>
                                        <clipPath id="nonForecastMasktg96f6j9"></clipPath>
                                        <clipPath id="gridRectMarkerMasktg96f6j9">
                                            <rect id="SvgjsRect1041" width="402" height="284" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <g id="SvgjsG1042" class="apexcharts-pie">
                                        <g id="SvgjsG1043" transform="translate(0, 0) scale(1)">
                                            <circle id="SvgjsCircle1044" r="89.30975609756098" cx="199" cy="140" fill="transparent"></circle>
                                            <g id="SvgjsG1045" class="apexcharts-slices">
                                                <g id="SvgjsG1046" class="apexcharts-series apexcharts-pie-series" seriesName="Remaining" rel="1" data:realIndex="0">
                                                    <path id="SvgjsPath1047" d="M 67.41463414634146 139.99999999999997 A 131.58536585365854 131.58536585365854 0 0 1 330.58536384949883 139.9770340213007 L 288.30975473729563 139.98441250709857 A 89.30975609756098 89.30975609756098 0 0 0 109.69024390243902 140 L 67.41463414634146 139.99999999999997 z" fill="rgba(175,14,14)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-0" index="0" j="0" data:angle="180" data:startAngle="-90" data:strokeWidth="5" data:value="999999999999" data:pathOrig="M 71.41463414634146 139.99999999999997 A 127.58536585365854 127.58536585365854 0 0 1 326.5853639104223 139.97773215299796 L 288.30975473729563 139.98441250709857 A 89.30975609756098 89.30975609756098 0 0 0 109.69024390243902 140 L 71.41463414634146 139.99999999999997 z" stroke="hsl(var(--background))" selected="false" data:pieClicked="true"></path>
                                                </g>
                                                <g id="SvgjsG1048" class="apexcharts-series apexcharts-pie-series" seriesName="Used" rel="2" data:realIndex="1">
                                                    <path id="SvgjsPath1049" d="M 326.5853658536586 140 A 127.58536585365854 127.58536585365854 0 0 1 326.5853639104223 139.97773215299796 L 288.30975473729563 139.98441250709857 A 89.30975609756098 89.30975609756098 0 0 0 288.309756097561 140 L 326.5853658536586 140 z" fill="rgba(154,52,205,0.2)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-1" index="0" j="1" data:angle="0" data:startAngle="90" data:strokeWidth="5" data:value="-999999999899" data:pathOrig="M 326.5853658536586 140 A 127.58536585365854 127.58536585365854 0 0 1 326.5853639104223 139.97773215299796 L 288.30975473729563 139.98441250709857 A 89.30975609756098 89.30975609756098 0 0 0 288.309756097561 140 L 326.5853658536586 140 z" stroke="hsl(var(--background))" data:pieClicked="false"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g> -->
                                    <!-- <line id="SvgjsLine1050" x1="0" y1="0" x2="398" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1051" x1="0" y1="0" x2="398" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line> -->
                                <!-- </g>
                            </svg> -->
                            <!-- <div class="apexcharts-tooltip apexcharts-theme-dark apexcharts-active" style="left: -88.5625px; top: -10.5px;">
                                <div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex; background-color: rgb(154, 52, 205);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(154, 52, 205); display: none;"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Remaining: </span><span class="apexcharts-tooltip-text-y-value">999999999999</span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group" style="order: 2; display: none; background-color: rgb(154, 52, 205);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(154, 52, 205); display: none;"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Remaining: </span><span class="apexcharts-tooltip-text-y-value">999999999999</span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div> -->
                        <!-- </div>
                    </div>
                </div>

                <div class="mt-4 flex flex-wrap items-center justify-center gap-4">
                    <div expanded-modal-trigger="expanded-modal-trigger" modal-trigger-variant="ghost-shadow" class="lqd-remaining-credit relative mx-2 flex flex-col gap-3 text-2xs">
                        <div class="lqd-modal lqd-modal-default static" x-data="{
        modalOpen: false,
        toggleModal() {
            			this.modalOpen = !this.modalOpen         }
    }"> -->
                            <!-- <a class="lqd-btn group inline-flex items-center justify-center gap-1.5 text-xs font-medium rounded-full transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/5 [&amp;[disabled]]:!bg-foreground/10 [&amp;[disabled]]:!text-foreground/35 [&amp;[disabled]]:pointer-events-none lqd-btn-ghost-shadow bg-background text-foreground shadow-xs hover:bg-primary hover:text-primary-foreground dark:hover:bg-foreground dark:hover:text-background focus-visible:bg-primary focus-visible:text-primary-foreground dark:bg-foreground/[3%] dark:focus-visible:bg-foreground dark:focus-visible:text-background lqd-btn-md py-2 px-4 lqd-btn-hover-none" @click.prevent="toggleModal()" href="">
                                View Your Credits
                            </a> -->
                            <!-- <template x-teleport="body" data-teleport-template="true">
                                <div class="lqd-modal-modal z-[999] flex items-center justify-center overflow-y-auto overscroll-contain fixed inset-0" x-show="modalOpen" x-transition="" @keyup.escape="modalOpen = false" :class="{ 'hidden': !modalOpen }">
                                    <div class="lqd-modal-backdrop fixed inset-0 bg-black/5 backdrop-blur-sm"></div>

                                    <div class="lqd-modal-content relative z-[100] max-h-[95vh] min-w-[min(calc(100%-2rem),540px)] rounded-xl bg-background shadow-2xl shadow-black/10 overflow-y-auto" @click.outside="modalOpen = false">
                                        <div class="lqd-modal-head flex flex-wrap items-center gap-3 border-b px-4 py-2 relative">
                                            <h4 class="my-0">Your Credit List</h4>

                                            <button class="lqd-modal-close size-8 ms-auto inline-flex items-center justify-center rounded-lg transition-all hover:bg-foreground/20" type="button" @click.prevent="modalOpen = false">
                                                <svg class="size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M18 6l-12 12"></path>
                                                    <path d="M6 6l12 12"></path>
                                                </svg> </button>
                                        </div>

                                        <div class="lqd-modal-body p-10">
                                            <div class="container p-0" @click.outside="modalOpen = false">
                                                <h3 class="mb-2">Unlock your creativity with credits</h3>
                                                <p class="mb-5">Each credit unlocks powerful AI tools and features designed to enhance your content creation.</p>

                                                <div class="credit-list-partial" id="credit-list-partial-312091">
                                                    <div class="grid min-h-[140px] w-full place-items-center overflow-x-scroll rounded-lg p-6 lg:overflow-visible">
                                                        <svg class="animate-spin text-gray-300" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24">
                                                            <path d="M32 3C35.8083 3 39.5794 3.75011 43.0978 5.20749C46.6163 6.66488 49.8132 8.80101 52.5061 11.4939C55.199 14.1868 57.3351 17.3837 58.7925 20.9022C60.2499 24.4206 61 28.1917 61 32C61 35.8083 60.2499 39.5794 58.7925 43.0978C57.3351 46.6163 55.199 49.8132 52.5061 52.5061C49.8132 55.199 46.6163 57.3351 43.0978 58.7925C39.5794 60.2499 35.8083 61 32 61C28.1917 61 24.4206 60.2499 20.9022 58.7925C17.3837 57.3351 14.1868 55.199 11.4939 52.5061C8.801 49.8132 6.66487 46.6163 5.20749 43.0978C3.7501 39.5794 3 35.8083 3 32C3 28.1917 3.75011 24.4206 5.2075 20.9022C6.66489 17.3837 8.80101 14.1868 11.4939 11.4939C14.1868 8.80099 17.3838 6.66487 20.9022 5.20749C24.4206 3.7501 28.1917 3 32 3L32 3Z" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path class="text-gray-900" d="M32 3C36.5778 3 41.0906 4.08374 45.1692 6.16256C49.2477 8.24138 52.7762 11.2562 55.466 14.9605C58.1558 18.6647 59.9304 22.9531 60.6448 27.4748C61.3591 31.9965 60.9928 36.6232 59.5759 40.9762" stroke="currentColor" stroke-width="5" stroke-linecap="round" stroke-linejoin="round">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                </div>

                                                <div class="mt-4 border-t pt-3 text-end">
                                                    <a @click.prevent="modalOpen = false" class="lqd-btn group inline-flex items-center justify-center gap-1.5 text-xs font-medium rounded-full transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/5 [&amp;[disabled]]:!bg-foreground/10 [&amp;[disabled]]:!text-foreground/35 [&amp;[disabled]]:pointer-events-none lqd-btn-outline outline outline-input-border -outline-offset-1 focus-visible:outline-2 focus-visible:outline-offset-0 focus-visible:outline-secondary lqd-btn-md py-2 px-4 lqd-btn-hover-none" href="#">
                                                        Close
                                                    </a>
                                                    <a class="lqd-btn group inline-flex items-center justify-center gap-1.5 text-xs font-medium rounded-full transition-all hover:-translate-y-0.5 hover:shadow-xl [&amp;[disabled]]:!bg-foreground/10 [&amp;[disabled]]:!text-foreground/35 [&amp;[disabled]]:pointer-events-none lqd-btn-primary bg-primary text-primary-foreground hover:bg-primary/90 hover:shadow-primary/10 focus-visible:bg-primary/90 focus-visible:shadow-primary/10 lqd-btn-md py-2 px-4 lqd-btn-hover-none" href="https://magicai.liquid-themes.com/dashboard/user/payment">
                                                        Upgrade Plan
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            fetch('https://magicai.liquid-themes.com/dashboard/user/payment/credit-list-partial?cache_key=credit-list-cache-1735544460')
                                .then(response => response.json())
                                .then(data => {
                                    let ID1 = '#credit-list-partial-direct-312091';
                                    let ID2 = '#credit-list-partial-312091';

                                    if (document.querySelector(ID1)) {
                                        document.querySelector(ID1).innerHTML = data.html;
                                    }

                                    if (document.querySelector(ID2)) {
                                        document.querySelector(ID2).innerHTML = data.html;
                                    }
                                });
                        });
                    </script> -->

                    <!-- <a class="lqd-btn group inline-flex items-center justify-center gap-1.5 text-xs font-medium rounded-full transition-all hover:-translate-y-0.5 hover:shadow-xl hover:shadow-black/5 [&amp;[disabled]]:!bg-foreground/10 [&amp;[disabled]]:!text-foreground/35 [&amp;[disabled]]:pointer-events-none lqd-btn-ghost-shadow bg-background text-foreground shadow-xs hover:text-primary-foreground dark:hover:bg-foreground dark:hover:text-background focus-visible:bg-primary focus-visible:text-primary-foreground dark:bg-foreground/[3%] dark:focus-visible:bg-foreground dark:focus-visible:text-background lqd-btn-md py-2 px-4 lqd-btn-hover-none hover:bg-primary" data-name="select_plan" href="https://magicai.liquid-themes.com/dashboard/user/payment">
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 5l0 14"></path>
                            <path d="M5 12l14 0"></path>
                        </svg> Select a Plan
                    </a> -->
                    <!-- <div class="mt-20 pt-20 flex flex-wrap items-center justify-center gap-4"> -->
                    <!-- <x-button
                        data-name="{{\App\Enums\Introduction::SELECT_PLAN}}"
                        class="hover:bg-primary"
                        variant="ghost-shadow"
                        href="{{ LaravelLocalization::localizeUrl(route('dashboard.user.payment.subscription')) }}">
                        <x-tabler-plus class="size-4" />
                        {{ __('Select a Plan') }}
                    </x-button>

                </div>
            </div>
        </strong>
</div> -->
<!-- @if (Auth::user()->remaining_words == -1)
            {{ __('Unlimited') }}
            @else

            @formatNumber(Auth::user()->remaining_words) || @formatNumber(Auth::user()->remaining_images)
            <br />
            @if (Auth::user()->remaining_words
            <= 100)
                <img style="display: inline-block; vertical-align:top;" src="/progress/red.png" alt="" width="50px;" height="50px;" />
            @formatNumber(Auth::user()->remaining_words)
            @elseif (Auth::user()->remaining_words
            <= 500)
                <img style="display: inline-block; vertical-align:top;" src="/progress/orange.png" alt="" width="50px;" height="50px;" />
            @formatNumber(Auth::user()->remaining_words)
            @elseif (Auth::user()->remaining_words
            <= 1000)
                <img style="display: inline-block; vertical-align:top;" src="/progress/yellow.png" alt="" width="50px;" height="50px;" />
            @formatNumber(Auth::user()->remaining_words)
            @else
            <img style="display: inline-block; vertical-align:top;" src="/progress/green.png" alt="" width="50px;" height="50px;" />
            @formatNumber(Auth::user()->remaining_words)
            @endif
            <br>

            
            @if(Auth::user()->remaining_images
            <=100)
                <img style="display: inline-block; vertical-align:top;" src="/progress/red.png" alt="" width="50px;" height="50px;" />
            @formatNumber(Auth::user()->remaining_images)
            @elseif (Auth::user()->remaining_images
            <= 500)
                <img style="display: inline-block; vertical-align:top;" src="/progress/yellow.png" alt="" width="50px;" height="50px;" />
            @formatNumber(Auth::user()->remaining_images)
            @elseif (Auth::user()->remaining_images
            <= 1000)
                <img style="display: inline-block; vertical-align:top;" src="/progress/orange.png" alt="" width="50px;" height="50px;" />
            @formatNumber(Auth::user()->remaining_images)
            @else
            <img style="display: inline-block; vertical-align:top;" src="/progress/green.png" alt="" width="50px;" height="50px;" />
            @formatNumber(Auth::user()->remaining_images)
            @endif

            @endif -->

<!-- @if (Auth::user()->remaining_words == -1)
            {{ __('Unlimited') }}
            @else

            @formatNumber(Auth::user()->remaining_words) || @formatNumber(Auth::user()->remaining_images) -->

<!-- <span>   @if(Auth::user()->remaining_images
            <=100)
                <img style="display: inline-block; vertical-align:top;" src="/progress/red.png" alt="" width="50px;" height="50px;" />
            @formatNumber(Auth::user()->remaining_images)
            @elseif (Auth::user()->remaining_images
            <= 500)
                <img style="display: inline-block; vertical-align:top;" src="/progress/yellow.png" alt="" width="50px;" height="50px;" />
            @formatNumber(Auth::user()->remaining_images)
            @elseif (Auth::user()->remaining_images
            <= 1000)
                <img style="display: inline-block; vertical-align:top;" src="/progress/orange.png" alt="" width="50px;" height="50px;" />
            @formatNumber(Auth::user()->remaining_images)
            @else
            <img style="display: inline-block; vertical-align:top;" src="/progress/green.png" alt="" width="50px;" height="50px;" />
            @formatNumber(Auth::user()->remaining_images)
            @endif
</span>
            <span>   @if(Auth::user()->remaining_images
            <=100)
                <img style="display: inline-block; vertical-align:top;" src="/progress/red.png" alt="" width="50px;" height="50px;" />
            @formatNumber(Auth::user()->remaining_images)
            @elseif (Auth::user()->remaining_images
            <= 500)
                <img style="display: inline-block; vertical-align:top;" src="/progress/yellow.png" alt="" width="50px;" height="50px;" />
            @formatNumber(Auth::user()->remaining_images)
            @elseif (Auth::user()->remaining_images
            <= 1000)
                <img style="display: inline-block; vertical-align:top;" src="/progress/orange.png" alt="" width="50px;" height="50px;" />
            @formatNumber(Auth::user()->remaining_images)
            @else
            <img style="display: inline-block; vertical-align:top;" src="/progress/green.png" alt="" width="50px;" height="50px;" />
            @formatNumber(Auth::user()->remaining_images)
            @endif
            @endif
</span>
</strong> -->
<br>
<!-- {{ __('Tokens') }} -->
<x-button
                        data-name="{{\App\Enums\Introduction::SELECT_PLAN}}"
                        class="hover:bg-primary"
                        variant="ghost-shadow"
                        href="{{ LaravelLocalization::localizeUrl(route('dashboard.user.payment.subscription')) }}">
                        <x-tabler-plus class="size-4" />
                        {{ __('Select a Plan') }}
                    </x-button>
</h3>
<br>

{{--<div
            class="relative [&_.apexcharts-legend-text]:!m-0 [&_.apexcharts-legend-text]:!pe-2 [&_.apexcharts-legend-text]:ps-2 [&_.apexcharts-legend-text]:!text-foreground"
            id="chart-credit"
        >--}}
</div>
</div>

<div class=" flex flex-wrap items-center justify-center gap-4">
    <!-- <x-button
        data-name="{{\App\Enums\Introduction::SELECT_PLAN}}"
        class="hover:bg-primary"
        variant="ghost-shadow"
        href="{{ LaravelLocalization::localizeUrl(route('dashboard.user.payment.subscription')) }}">
        <x-tabler-plus class="size-4" />
        {{ __('Select a Plan') }}
    </x-button> -->

    @if (getSubscriptionStatus())
    <x-button
        variant="danger"
        onclick="return confirm('Are you sure to cancel your plan? You will lose your remaining usage.');"
        href="{{ LaravelLocalization::localizeUrl(route('dashboard.user.payment.cancelActiveSubscription')) }}">
        <x-tabler-circle-minus class="size-4" />
        {{ __('Cancel My Plan') }}
    </x-button>
    @endif
</div>
@endif

@push('script')
<script src="{{ custom_theme_url('/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        fetch('https://magicai.liquid-themes.com/dashboard/user/payment/credit-list-partial?cache_key=credit-list-cache-1735542773')
            .then(response => response.json())
            .then(data => {
                let ID1 = '#credit-list-partial-direct-188011';
                let ID2 = '#credit-list-partial-188011';

                if (document.querySelector(ID1)) {
                    document.querySelector(ID1).innerHTML = data.html;
                }

                if (document.querySelector(ID2)) {
                    document.querySelector(ID2).innerHTML = data.html;
                }
            });
    });
</script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        "use strict";

        const options = {
            series: [{
                {
                    (int) Auth::user() - > remaining_words
                }
            }, {
                {
                    (int) $total_words
                }
            }],
            labels: [@json(__('Remaining')), @json(__('Used'))],
            colors: ['#9A34CD', 'rgba(154,52,205,0.2)'],
            tooltip: {
                style: {
                    color: '#ffffff',
                },
            },
            chart: {
                type: 'donut',
                height: 215,
            },
            legend: {
                position: 'bottom',
                fontFamily: 'inherit',
            },
            plotOptions: {
                pie: {
                    startAngle: -90,
                    endAngle: 90,
                    offsetY: 0,
                    donut: {
                        size: '70%',
                    }
                },
            },
            grid: {
                padding: {
                    bottom: -130
                }
            },
            stroke: {
                width: 5,
                colors: 'hsl(var(--background))'
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 280,
                        height: 250
                    },
                }
            }],
            dataLabels: {
                enabled: false,
            }
        };
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-credit'), options)).render();
    });
    // @formatter:on
</script>
@endpush