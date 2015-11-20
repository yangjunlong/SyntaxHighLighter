<?php
/*
 * just test example
 * 
 * @author  Yang,junlong at 2015-11-19 0:16:01 build.
 * @version $Id$
 */

require 'SyntaxHighLighter.php';

$css_code = "class CHelloWorld
{
private:
	LPTSTR	m_buf[80];

public:
	CHellWorld()
	{
		_tcscpy(m_buf, TEXT(\"Hello, world!\");
	}

	~CHelloWord()
	{
	}

	void PrintMessage()
	{
		printf(\"%s\n\", m_buf);
	}

	void PrintMessage2()
	{
		for(int i=0; i<10; ++i)
			PrintMessage();
	}

	void PrintMessage3()
	{
		double z = 10.0;

		while(z)
		{
			PrintMessage();
			z -= 2.0;
		}
	}

	virtual void PrintMessage4() = 0;
};
";

echo SyntaxHighLighterFactory::parse($css_code, 'cpp');
