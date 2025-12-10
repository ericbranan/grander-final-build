import React, { useState } from 'react';
import { Home, Lightbulb, ClipboardCheck, Hammer, Key } from 'lucide-react';

const BuildProcessTimeline = () => {
  const [activeStep, setActiveStep] = useState(null);

  const steps = [
    {
      number: "01",
      title: "Getting Started",
      icon: Home,
      description: "Every exceptional home begins with a conversation. At Grander Construction, we start by listening to you — your lifestyle, priorities, and vision shape every design decision. By understanding how you live, we create a foundation for a home that's uniquely yours and built to enhance daily life in Upstate South Carolina.",
      color: "#8B7355"
    },
    {
      number: "02",
      title: "Dream and Design",
      icon: Lightbulb,
      description: "Our collaborative design process turns your ideas into a clear, thoughtful plan. Together, we refine layouts, select premium materials, and define architectural details that reflect your goals. Whether it's a custom home, a pool house, or a luxury outdoor living space, this phase ensures every element fits both your style and your practical needs.",
      color: "#6B5D52"
    },
    {
      number: "03",
      title: "Comprehensive Planning",
      icon: ClipboardCheck,
      description: "Before construction begins, our team leads a thorough planning process that brings design and build into perfect alignment. We conduct onsite evaluations, anticipate challenges, and fine-tune the approach so the path to construction is clear, efficient, and precise. This preparation sets the stage for a smooth building experience with no surprises.",
      color: "#8B7355"
    },
    {
      number: "04",
      title: "Build with Care",
      icon: Hammer,
      description: "Construction is where your vision takes shape. From groundbreaking to the final walk-through, our expert builders and project managers work with meticulous attention to detail. You'll receive clear communication, regular updates, and personalized service every step of the way. We're committed to craftsmanship that meets the highest standards and stands the test of time.",
      color: "#6B5D52"
    },
    {
      number: "05",
      title: "Welcome Home",
      icon: Key,
      description: "When construction is complete, we walk through every detail together to ensure your home meets — and often exceeds — expectations. The result is a space built with care, designed to last, and ready for a lifetime of memories. Whether it's your primary residence or a custom addition, your new space will reflect the quality and character that define Grander Construction.",
      color: "#8B7355"
    }
  ];

  return (
    <div className="max-w-6xl mx-auto px-6 py-20 bg-white" style={{ fontFamily: 'acumin-pro, sans-serif' }}>
      {/* Header Section */}
      <div className="text-center mb-20">
        <h2 className="text-5xl md:text-6xl font-light tracking-wide text-gray-900 mb-6" 
            style={{ fontFamily: 'acumin-pro-extra-condensed, sans-serif', letterSpacing: '0.02em' }}>
          OUR BUILD PROCESS
        </h2>
        <div className="w-24 h-1 bg-gradient-to-r from-transparent via-amber-700 to-transparent mx-auto mb-6"></div>
        <p className="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto font-light leading-relaxed">
          From initial conversation to final walk-through, every step is designed to bring your vision to life with precision and care.
        </p>
      </div>

      {/* Timeline Container */}
      <div className="relative pl-8 md:pl-24">
        {/* Vertical Timeline Line - Desktop */}
        <div 
          className="hidden md:block absolute left-6 md:left-20 top-0 w-0.5 bg-gray-300" 
          style={{ 
            height: '100%'
          }}
        />

        {/* Process Steps */}
        <div className="space-y-16 md:space-y-20">
          {steps.map((step, index) => {
            const Icon = step.icon;
            const isLast = index === steps.length - 1;
            
            return (
              <div
                key={index}
                className="relative flex items-start gap-6 md:gap-12"
                onMouseEnter={() => setActiveStep(index)}
                onMouseLeave={() => setActiveStep(null)}
              >
                {/* Timeline Point */}
                <div className="absolute left-0 md:left-14 top-2 transform -translate-x-1/2">
                  {/* Outer ring - expands on hover */}
                  <div
                    className={`absolute inset-0 rounded-full transition-all duration-500 ${
                      activeStep === index ? 'scale-100 opacity-100' : 'scale-90 opacity-0'
                    }`}
                    style={{ 
                      width: '80px',
                      height: '80px',
                      border: `2px solid ${step.color}`,
                      left: '-10px',
                      top: '-10px'
                    }}
                  />
                  
                  {/* Inner circle with icon */}
                  <div
                    className={`relative w-14 h-14 md:w-16 md:h-16 rounded-full flex items-center justify-center shadow-lg transition-all duration-500 ${
                      activeStep === index ? 'scale-110' : 'scale-100'
                    }`}
                    style={{ 
                      backgroundColor: 'white',
                      border: `3px solid ${step.color}`
                    }}
                  >
                    <Icon 
                      className="w-6 h-6 md:w-8 md:h-8 transition-colors duration-500" 
                      style={{ 
                        color: step.color
                      }}
                    />
                  </div>
                </div>

                {/* Content Area */}
                <div className="flex-1 ml-12 md:ml-0">
                  {/* Number and Title */}
                  <div className="flex items-baseline gap-4 mb-4">
                    <span 
                      className="text-6xl md:text-7xl font-light tracking-tight transition-all duration-500"
                      style={{ 
                        fontFamily: 'acumin-pro-extra-condensed, sans-serif',
                        color: activeStep === index ? step.color : '#D4D4D4',
                      }}
                    >
                      {step.number}
                    </span>
                    <h3 
                      className="text-3xl md:text-4xl font-light tracking-wide text-gray-900 leading-tight"
                      style={{ fontFamily: 'acumin-pro-extra-condensed, sans-serif' }}
                    >
                      {step.title}
                    </h3>
                  </div>
                  
                  {/* Image Placeholder */}
                  <div 
                    className={`rounded-none overflow-hidden bg-gray-50 aspect-[16/9] flex items-center justify-center border transition-all duration-300 mb-6 ${
                      activeStep === index ? 'border-2' : 'border'
                    }`}
                    style={{ 
                      borderColor: activeStep === index ? step.color : '#E5E7EB'
                    }}
                  >
                    <div className="text-center text-gray-400">
                      <Icon className="w-16 h-16 mx-auto mb-3" style={{ color: step.color }} />
                      <p className="text-sm font-light" style={{ fontFamily: 'acumin-pro, sans-serif' }}>Image Placeholder</p>
                      <p className="text-xs mt-1 font-light">Upload your image here</p>
                    </div>
                  </div>

                  {/* Description - Larger text */}
                  <p 
                    className="text-gray-700 leading-loose font-light text-lg md:text-xl"
                    style={{ fontFamily: 'acumin-pro, sans-serif', lineHeight: '1.9' }}
                  >
                    {step.description}
                  </p>
                </div>
              </div>
            );
          })}
        </div>
      </div>

      {/* Call to Action */}
      <div className="text-center mt-24 pt-16 border-t border-gray-200">
        <h3 
          className="text-4xl md:text-5xl font-light tracking-wide text-gray-900 mb-6"
          style={{ fontFamily: 'acumin-pro-extra-condensed, sans-serif' }}
        >
          READY TO GET STARTED?
        </h3>
        <p className="text-lg md:text-xl text-gray-600 mb-10 font-light leading-relaxed max-w-2xl mx-auto"
           style={{ fontFamily: 'acumin-pro, sans-serif' }}>
          Let's begin the conversation about your dream home in Upstate South Carolina.
        </p>
        <button 
          className="px-10 py-4 text-white text-base md:text-lg font-normal tracking-wide transition-all duration-300 hover:opacity-90 shadow-lg"
          style={{ 
            backgroundColor: '#8B7355',
            fontFamily: 'acumin-pro, sans-serif',
            letterSpacing: '0.05em'
          }}
        >
          TELL US ABOUT YOUR PROJECT
        </button>
      </div>
    </div>
  );
};

export default BuildProcessTimeline;