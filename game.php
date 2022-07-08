<?php
$chooseBox = new Func("chooseBox", function() use (&$chooseBoxButton, &$chosenBox, &$addValuesNStuff) {
  $chooseBox = Func::getCurrent();
  set(get($chooseBox, "style"), "display", "block");
  for ($i = 0.0; $i < get($chooseBoxButton, "length"); $i++) {
    call_method(get($chooseBoxButton, $i), "addEventListener", "click", new Func(function() use (&$chosenBox, &$chooseBox, &$addValuesNStuff) {
      $this_ = Func::getContext();
      $chosenBox = get($this_, "textContent");
      set(get($chooseBox, "style"), "display", "none");
      call($addValuesNStuff);
    }));
  }
});
$addValuesNStuff = new Func("addValuesNStuff", function() use (&$boxes, &$boxValue, &$shuffledValues, &$chosenBox, &$boxNr, &$winningBox, &$console, &$openedBoxes, &$moneyShow, &$calcOffer, &$show, &$bank, &$animateValue, &$bankOffer, &$winnings, &$lastDeal) {
  for ($i = 0.0; $i < get($boxes, "length"); $i++) {
    set(get($boxValue, $i), "textContent", _concat("\$", get($shuffledValues, $i)));
    call_method(get(get($boxValue, $i), "classList"), "add", "hideValue");
    call(new Func(function($j = null) use (&$chosenBox, &$boxNr, &$boxes, &$winningBox, &$boxValue, &$console, &$openedBoxes, &$shuffledValues, &$moneyShow, &$calcOffer, &$show, &$bank, &$animateValue, &$bankOffer, &$winnings, &$lastDeal) {
      if ($chosenBox !== get(get($boxNr, $j), "textContent")) {
        call_method(get($boxes, $j), "addEventListener", "click", new Func(function() use (&$boxValue, &$j, &$boxNr, &$openedBoxes, &$shuffledValues, &$moneyShow, &$calcOffer, &$show, &$bank, &$animateValue, &$bankOffer, &$winningBox, &$winnings, &$lastDeal) {
          $this_ = Func::getContext();
          call_method(get(get($boxValue, $j), "classList"), "remove", "hideValue");
          call_method(get(get($boxValue, $j), "classList"), "add", "showValue");
          call_method(get(get($boxNr, $j), "classList"), "add", "hideValue");
          call_method(get($this_, "classList"), "add", "openedBox");
          $openedBoxes++;
          for ($i = 0.0; $i < get($shuffledValues, "length"); $i++) {
            if (_concat("\$", get($shuffledValues, $i)) === get(get($boxValue, $j), "textContent")) {
              call_method($shuffledValues, "splice", new Arr($i), 1.0);
            }
          }
          for ($i = 0.0; $i < get($moneyShow, "length"); $i++) {
            if (get(get($moneyShow, $i), "textContent") === get(get($boxValue, $j), "textContent")) {
              if ($i < _divide(get($moneyShow, "length"), 2.0)) {
                call_method(get(get($moneyShow, $i), "classList"), "add", "hideValueLeft");
              } else {
                call_method(get(get($moneyShow, $i), "classList"), "add", "hideValueRight");
              }

            }
          }
          if ($openedBoxes === 5.0 || $openedBoxes === 10.0 || $openedBoxes === 15.0 || $openedBoxes === 18.0 || $openedBoxes === 21.0) {
            call($calcOffer);
            call($show, $bank);
            call($animateValue, $bankOffer, 0.0, call($calcOffer), 1000.0);
          }
          if ($openedBoxes === 22.0) {
            set($winnings, "textContent", $winningBox);
            set(get($lastDeal, "style"), "display", "block");
          }
        }), new Object("once", true));
      } else {
        call_method(get(get($boxes, $j), "classList"), "add", "chosenBox");
        $winningBox = get(get($boxValue, $j), "textContent");
        call_method($console, "log", "what");
      }

    }), $i);
  }
});
$calcOffer = new Func("calcOffer", function() use (&$shuffledValues, &$Math) {
  $valuesSum = call_method($shuffledValues, "reduce", new Func(function($a = null, $b = null) {
    return _plus($a, $b);
  }), 0.0);
  $randomPercentage = _plus(to_number(_plus(call_method($Math, "floor", to_number(call_method($Math, "random")) * 10.0), 1.0)) * 0.01, 1.0);
  $offer = to_number(call_method($Math, "round", _divide(_divide($valuesSum, get($shuffledValues, "length")) * to_number($randomPercentage), 100.0))) * 100.0;
  return $offer;
});
$show = new Func("show", function($div = null) {
  set(get($div, "style"), "display", "block");
});
$hide = new Func("hide", function($div = null) {
  set(get($div, "style"), "display", "none");
});
$finish = new Func("finish", function() use (&$finished) {
  set(get($finished, "style"), "display", "block");
});
$shuffleArray = new Func("shuffleArray", function($array = null) use (&$Math) {
  for ($i = to_number(get($array, "length")) - 1.0; $i > 0.0; $i--) {
    $j = call_method($Math, "floor", to_number(call_method($Math, "random")) * to_number(_plus($i, 1.0)));
    $temp = get($array, $i);
    set($array, $i, get($array, $j));
    set($array, $j, $temp);
  }
  return $array;
});
$animateValue = new Func("animateValue", function($id = null, $start = null, $end = null, $duration = null) use (&$Math, &$Date, &$setInterval, &$clearInterval) {
  $run = new Func("run", function() use (&$Date, &$Math, &$duration, &$endTime, &$end, &$range, &$obj, &$clearInterval, &$timer) {
    $now = call_method(_new($Date), "getTime");
    $remaining = call_method($Math, "max", _divide((to_number($endTime) - to_number($now)), $duration), 0.0);
    $value = call_method($Math, "round", to_number($end) - to_number($remaining) * to_number($range));
    set($obj, "innerHTML", _concat("\$", $value));
    if (eq($value, $end)) {
      call($clearInterval, $timer);
    }
  });
  $obj = $id;
  $range = to_number($end) - to_number($start);
  $minTimer = 50.0;
  $stepTime = call_method($Math, "abs", call_method($Math, "floor", _divide($duration, $range)));
  $stepTime = call_method($Math, "max", $stepTime, $minTimer);
  $startTime = call_method(_new($Date), "getTime");
  $endTime = _plus($startTime, $duration);
  $timer = call($setInterval, $run, $stepTime);
  call($run);
});
$moneyValues = new Arr(1.0, 5.0, 7.0, 10.0, 25.0, 50.0, 75.0, 100.0, 250.0, 500.0, 750.0, 1000.0, 2500.0, 5000.0, 7500.0, 10000.0, 25000.0, 50000.0, 75000.0, 100000.0, 250000.0, 500000.0, 750000.0, 1000000.0);
$boxes = call_method($document, "querySelectorAll", ".box");
$boxNr = call_method($document, "querySelectorAll", ".boxNr");
$boxValue = call_method($document, "querySelectorAll", ".boxValue");
$moneyShow = call_method($document, "querySelectorAll", ".moneyShow");
$bigMoneys = call_method($document, "getElementById", "bigMoneys");
$bank = call_method($document, "getElementById", "bank");
$yesDeal = call_method($document, "getElementById", "yesDeal");
$noDeal = call_method($document, "getElementById", "noDeal");
$bankOffer = call_method($document, "querySelector", ".bankOffer");
$prevOffers = call_method($document, "getElementById", "prevOffers");
$finished = call_method($document, "getElementById", "finished");
$chosenBox = 0.0;
$previousOffers = new Arr();
$openedBoxes = 0.0;
$winnings = call_method($document, "getElementById", "winnings");
$lastDeal = call_method($document, "getElementById", "lastDeal");
$keepBox = call_method($document, "getElementById", "keepBox");
$changeBox = call_method($document, "getElementById", "changeBox");
$winningBox = 0.0;
$chooseBox = call_method($document, "getElementById", "chooseBox");
$chooseBoxButton = call_method($document, "querySelectorAll", ".chooseBoxButton");
$tutorial = call_method($document, "getElementById", "tutorial");
$seeTutorialButton = call_method($document, "getElementById", "seeTutorialButton");
call_method($seeTutorialButton, "addEventListener", "click", new Func(function() use (&$tutorial) {
  set(get($tutorial, "style"), "display", "block");
}));
call_method($tutorialButton, "addEventListener", "click", new Func(function() use (&$tutorial) {
  set(get($tutorial, "style"), "display", "none");
}));
$fr = 0.0;
$fg = 30.0;
$fb = 79.0;
$sr = 200.0;
$sg = 15.0;
$sb = 0.0;
for ($i = 0.0; $i < get($moneyShow, "length"); $i++) {
  $moneyDisplay = _concat("\$", get($moneyValues, $i));
  set(get($moneyShow, $i), "textContent", $moneyDisplay);
  if ($i < _divide(get($moneyShow, "length"), 2.0)) {
    call_method(get(get($moneyShow, $i), "classList"), "add", "rounded1");
    set(get(get($moneyShow, $i), "style"), "backgroundColor", _concat("rgb(", $fr, ", ", $fg, ", ", $fb, ")"));
    $fb = _plus($fb, 8.0);
    $fg = _plus($fg, 5.0);
  } else {
    call_method(get(get($moneyShow, $i), "classList"), "add", "rounded2");
    set(get(get($moneyShow, $i), "style"), "backgroundColor", _concat("rgb(", $sr, ", ", $sg, ", ", $sb, ")"));
    $sr -= 12.0;
    $sg -= 1.0;
  }

}
$shuffledValues = call($shuffleArray, $moneyValues);
set(get($chooseBox, "style"), "display", "block");
for ($i = 0.0; $i < get($chooseBoxButton, "length"); $i++) {
  call_method(get($chooseBoxButton, $i), "addEventListener", "click", new Func(function() use (&$chosenBox, &$hide, &$chooseBox, &$addValuesNStuff) {
    $this_ = Func::getContext();
    $chosenBox = get($this_, "textContent");
    call($hide, $chooseBox);
    call($addValuesNStuff);
  }));
}
call_method($noDeal, "addEventListener", "click", new Func(function() use (&$bank, &$previousOffers, &$bankOffer, &$prevOffers) {
  set(get($bank, "style"), "display", "none");
  call_method($previousOffers, "push", get($bankOffer, "textContent"));
  set($prevOffers, "textContent", _concat("Previous Offers: ", $previousOffers));
}));
call_method($yesDeal, "addEventListener", "click", new Func(function() use (&$bank, &$winnings, &$bankOffer, &$finish) {
  set(get($bank, "style"), "display", "none");
  set($winnings, "textContent", get($bankOffer, "textContent"));
  call($finish);
}));
call_method($keepBox, "addEventListener", "click", new Func(function() use (&$lastDeal, &$finish) {
  set(get($lastDeal, "style"), "display", "none");
  call($finish);
}));
call_method($changeBox, "addEventListener", "click", new Func(function() use (&$lastDeal, &$shuffledValues, &$winningBox, &$winnings, &$finish) {
  set(get($lastDeal, "style"), "display", "none");
  for ($i = 0.0; $i < get($shuffledValues, "length"); $i++) {
    if (get($shuffledValues, $i) !== $winningBox) {
      set($winnings, "textContent", _concat("\$", get($shuffledValues, $i)));
    }
  }
  call($finish);
}));

