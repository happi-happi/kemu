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
        Schema::create('lessonplanstdiiitostdvi', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('staff_id');
                $table->foreign('staff_id')->references('id')->on('staff')->onDelete('cascade');
                $table->unsignedBigInteger('school_id'); // Place it after a specific column or just add it
                $table->foreign('school_id')->references('id')->on('schoolinformation') ->onUpdate('cascade');                   
                $table->string('class');
                $table->date('date'); // Changed from time to date
                $table->unsignedBigInteger('subject_id');
                $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
                $table->integer('registeredgirls');
                $table->integer('registeredboys');
                $table->integer('presentgirls');
                $table->integer('presentboys');
                $table->text('maincompetence'); // Changed to text
                $table->text('specificcompetence'); // Changed to text
                $table->text('mainactivity'); // Changed to text
                $table->text('specificactivity'); // Changed to text
                $table->text('teachingandlearningresources'); // Changed to text
                $table->text('references'); // Changed to text
                $table->string('IntroductionTime');
                $table->text('IntroductionTeachingActivities'); // Changed to text
                $table->text('IntroductionLearningActivities'); // Changed to text
                $table->text('IntroductionAssessmentCriteria'); // Changed to text
                $table->string('CompetenceDevelopementTime');
                $table->text('CompetenceDevelopementTeachingActivities'); // Changed to text
                $table->text('CompetenceDevelopementLearningActivities'); // Changed to text
                $table->text('CompetenceDevelopementAssessmentCriteria'); // Changed to text
                $table->string('DesignTime');
                $table->text('DesignTeachingActivities'); // Changed to text
                $table->text('DesignLearningActivities'); // Changed to text
                $table->text('DesignAssessmentCriteria'); // Changed to text
                $table->string('RealisationTime');
                $table->text('RealisationTeachingActivities'); // Changed to text
                $table->text('RealisationLearningActivities'); // Changed to text
                $table->text('RealisationAssessmentCriteria'); // Changed to text
                $table->text('Remarks'); // Changed to text
                $table->timestamps();
            });
            
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessonplanstdiiitostdvi');
    }
};
