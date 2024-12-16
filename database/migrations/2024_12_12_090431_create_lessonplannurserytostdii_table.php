<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lessonplannurserytostdii', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id');
            $table->foreign('staff_id')->references('id')->on('staff');
            $table->string('class');
            $table->time('date');
            $table->unsignedBigInteger('subject_id');
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->integer('registeredgirls');
            $table->integer('registeredboys');
            $table->integer('presentgirls');
            $table->integer('presentboys');
            $table->string('maincompetence');
            $table->string('specificcompetence');
            $table->string('mainactivity');
            $table->string('specificactivity');
            $table->string('teachingandlearningresources');
            $table->string('references');
            $table->string('IntroductionTime');
            $table->string('IntroductionTeachingActivities');
            $table->string('IntroductionLearningActivities');
            $table->string('IntroductionAssessmentCriteria');
            $table->string('CompetenceDevelopementTime');
            $table->string('CompetenceDevelopementTeachingActivities');
            $table->string('CompetenceDevelopementLearningActivities');
            $table->string('CompetenceDevelopementAssessmentCriteria');
            $table->string('DesignTime');
            $table->string('DesignTeachingActivities');
            $table->string('DesignLearningActivities');
            $table->string('DesignAssessmentCriteria');
            $table->string('RealisationTime');
            $table->string('RealisationTeachingActivities');
            $table->string('RealisationLearningActivities');
            $table->string('RealisationAssessmentCriteria');
            $table->string('Remarks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessonplannurserytostdii');
    }
};
