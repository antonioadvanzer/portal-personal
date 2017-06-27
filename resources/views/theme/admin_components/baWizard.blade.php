<div class="ba-wizard">
    <div class="ba-wizard-navigation-container">
        <div ng-repeat="t in $baWizardController.tabs" class="ba-wizard-navigation @{{$baWizardController.tabNum == $index ? 'active' : ''}}" ng-click="$baWizardController.selectTab($index)">
            @{{t.title}}
        </div>
    </div>

    <div class="progress ba-wizard-progress">
        <div class="progress-bar progress-bar-danger active" role="progressbar"
             aria-valuemin="0" aria-valuemax="100" ng-style="{width: $baWizardController.progress + '%'}">
        </div>
    </div>

    <div class="steps" ng-transclude></div>

    <nav>
        <ul class="pager ba-wizard-pager">
            <li class="previous"><button  ng-disabled="$baWizardController.isFirstTab()" ng-click="$baWizardController.previousTab()" type="button" class=" btn btn-primary"><span aria-hidden="true">&larr;</span> previous</button></li>
            <li class="next"> <button ng-disabled="$baWizardController.isLastTab()" ng-click="$baWizardController.nextTab()" type="button" class="btn btn-primary">next <span aria-hidden="true">&rarr;</span></button></li>
        </ul>
    </nav>
</div>