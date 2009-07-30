#!/usr/bin/env ruby

#
# y2phpy.rb - yacc to php yacc for Stagehand_PHP_Parser
# 
# Original source::
# http://bz2.jp/misc/php_haskell/y2phpy.rb
# http://blog.bz2.jp/archives/2008/03/haskell-hackath.html
#

grammar = []
is_cfg = false
is_grammar = false
non_terminal = nil
count = 0;

def puts_grammar non_terminal, grammar
  prefix = grammar[0] == '|' ? grammar.shift : nil

  grammar_without_comment = grammar.join(' ').gsub(%r|/\*.*\*/|, '').split;

  arguments = Array.new(grammar_without_comment.length) {|i| "$#{i+1}"}
  arguments = 'array('+arguments.join(', ')+')'

  hook_script = "{ self::filter('%s', %s, %s); }" % [non_terminal, '$$', arguments]

  puts "\t%s\t%s\t%s" % [prefix, grammar.join(' '), hook_script]
end

while line = ARGF.gets
  [[/\{[^'].+?[^']\}/, ''], [/^#.*$/, '']].each {|arg|
    line.gsub! arg[0], arg[1]
  }
  line.rstrip!

  is_cfg = !is_cfg if line[0, 2] == '%%'

  if is_grammar
    new_grammar = line.split
    case new_grammar[0]
    when '|'
      count += 1;
      puts_grammar "#{non_terminal}_#{count}", grammar
      grammar = new_grammar
    when ';'
      count += 1;
      puts_grammar "#{non_terminal}_#{count}", grammar
      puts ';'
      grammar = []
    else
      grammar += new_grammar
    end
  else
    puts line
  end

  if is_cfg && (/^(\w+):/ =~ line || line == ';')
    is_grammar = !is_grammar
    non_terminal = $1
    count = 0;
  end
end
